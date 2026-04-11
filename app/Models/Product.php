<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'price',
        'description',
        'slug',
        'category_id',
        'is_promoted',
        'promo_price',
        'promo_start_at',
        'promo_end_at',
        'promo_label'
    ];

    public function isOnPromotion()
    {
        if (!$this->is_promoted || !$this->promo_price) {
            return false;
        }

        $now = now();
        $start = $this->promo_start_at;
        $end = $this->promo_end_at;

        if ($start && $now->lt($start)) {
            return false;
        }

        if ($end && $now->gt($end)) {
            return false;
        }

        return true;
    }

    public function currentPrice()
    {
        return $this->isOnPromotion() ? $this->promo_price : $this->price;
    }

    public function oldPrice()
    {
        return $this->isOnPromotion() ? $this->price : null;
    }

    public function discountPercentage()
    {
        if (!$this->isOnPromotion()) {
            return 0;
        }

        return round((($this->price - $this->promo_price) / $this->price) * 100);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function productGallery()
    {
        return $this->hasMany(ProductGallery::class, 'product_id', 'id');
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'product_id', 'id');
    }

    public function transactionItem()
    {
        return $this->hasMany(TransactionItem::class, 'product_id', 'id');
    }
}
