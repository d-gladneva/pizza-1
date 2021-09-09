<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'code', 'position'
    ];

    protected $hidden = array(
        'position', 'created_at', 'updated_at'
    );

    /**
     * Get the products for category.
     */
    public function product()
    {
        return $this->hasMany('App\Models\Product');
    }
}
