<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Category::query();
            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded shadow-lg" href="' . route('dashboard.category.edit', $item->id) . '">
                            Modifier
                        </a>
                        <form action="' . route('dashboard.category.destroy', $item->id) . '" method="post" class="inline-block">
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold ml-3 py-1 px-3 rounded shadow-lg">Supprimer</button>
                        ' . method_field('delete') . csrf_field() . '
                        </form>
                    ';
                })
                ->editColumn('image', function ($item) {
                    return $item->image ? '<img src="' . Storage::url($item->image) . '" class="w-20 rounded" />' : 'N/A';
                })
                ->rawColumns(['action', 'image'])
                ->make();
        }
        return view('pages.dashboard.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('assets/category', 'public');
        }

        Category::create($data);

        return redirect()->route('dashboard.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.dashboard.category.edit', [
            'item' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if ($category->image) {
                Storage::disk('public')->delete($category->image);
            }
            $data['image'] = $request->file('image')->store('assets/category', 'public');
        }

        $category->update($data);

        return redirect()->route('dashboard.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::disk('public')->delete($category->image);
        }
        $category->delete();

        return redirect()->route('dashboard.category.index');
    }
}
