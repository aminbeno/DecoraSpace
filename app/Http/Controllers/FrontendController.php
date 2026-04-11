<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CheckoutRequest;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::with(['productGallery'])->latest()->limit(10)->get();
        $promoProducts = Product::with(['productGallery'])
            ->where('is_promoted', true)
            ->where(function($query) {
                $now = now();
                $query->whereNull('promo_start_at')
                      ->orWhere('promo_start_at', '<=', $now);
            })
            ->where(function($query) {
                $now = now();
                $query->whereNull('promo_end_at')
                      ->orWhere('promo_end_at', '>=', $now);
            })
            ->limit(4)
            ->get();
        $categories = Category::withCount('products')->limit(4)->get();

        return view('pages.frontend.index', compact('products', 'promoProducts', 'categories'));
    }

    public function details(Request $request, $slug)
    {
        $product = Product::with(['productGallery'])->where('slug', $slug)->firstOrFail();
        $recommendations = Product::with(['productGallery'])->whereNot('slug', $slug)->inRandomOrder()->limit(4)->get();

        return view('pages.frontend.details', compact('product', 'recommendations'));
    }

    public function cart(Request $request)
    {
        $carts = Cart::with(['product.productGallery'])->where('user_id', Auth::user()->id)->get();
        $total_price = 0;

        foreach ($carts as $cart) {
            $total_price  += $cart->product->currentPrice();
        }

        return view('pages.frontend.cart', compact('carts', 'total_price'));
    }

    public function cartAdd(Request $request, $id)
    {
        Product::findOrFail($id);

        Cart::create([
            'product_id' => $id,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('cart');
    }

    public function cartDelete(Request $request, $id)
    {
        $cart = Cart::where('user_id', Auth::id())->findOrFail($id);
        $cart->delete();

        return redirect()->route('cart');
    }

    public function checkout(CheckoutRequest $request)
    {
        $data = $request->all();

        // Get Carts Data
        $carts = Cart::with(['product'])->where('user_id', Auth::user()->id)->get();

        if ($carts->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Add to Transaction data
        $data['user_id'] = Auth::user()->id;
        $data['courier'] = 'JNE Express';
        $data['total_price'] = $carts->sum(function($cart) {
            return $cart->product->currentPrice();
        });
        $data['payment_method'] = 'COD';
        $data['status'] = 'PENDING';

        // Create transaction
        $transaction = Transaction::create($data);

        // Create Transaction Item
        foreach ($carts as $cart) {
            TransactionItem::create([
                'transaction_id' => $transaction->id,
                'user_id' => $cart->user_id,
                'product_id' => $cart->product_id
            ]);
        }

        // Delete cart after transaction
        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('checkout-success');
    }

    public function success(Request $request)
    {
        return view('pages.frontend.success');
    }

    public function catalog(Request $request)
    {
        $products = Product::with(['productGallery', 'category']);
        $categories = Category::withCount('products')->get();

        if ($request->has('category')) {
            $products->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        }

        if ($request->has('promo')) {
            $now = now();
            $products->where('is_promoted', true)
                ->where(function($query) use ($now) {
                    $query->whereNull('promo_start_at')
                          ->orWhere('promo_start_at', '<=', $now);
                })
                ->where(function($query) use ($now) {
                    $query->whereNull('promo_end_at')
                          ->orWhere('promo_end_at', '>=', $now);
                });
        }

        $products = $products->latest()->get();

        return view('pages.frontend.catalog', compact('products', 'categories'));
    }

    public function about()
    {
        return view('pages.frontend.about');
    }

    public function contact()
    {
        return view('pages.frontend.contact');
    }
}
