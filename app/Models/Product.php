<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'price', 'position', 'quantity', 'category_id'
    ];

    protected $hidden = array(
        'category_id', 'position', 'created_at', 'updated_at'
    );

    /**
     * Get the category for product.
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
