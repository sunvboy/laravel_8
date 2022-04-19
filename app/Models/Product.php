<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'alanguage', 'slug', 'catalogueid', 'catalogue', 'image', 'description', 'meta_title', 'meta_description', 'userid_created', 'userid_updated', 'created_at', 'updated_at', 'publish', 'order', 'version_json'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'userid_created');
    }
    public function product_version()
    {
        return $this->hasMany(Products_version::class, 'productid');
    }
    public function tags()
    {
        return $this->hasMany(Tags_relationship::class, 'moduleid')->select('tagid')->where('module', '=', 'product');
    }
    public function brands()
    {
        return $this->hasMany(Brands_relationships::class, 'moduleid')->select('brandid')->where('module', '=', 'product');
    }
    public function catalogues_relationships()
    {
        return $this->hasMany(Catalogues_relationships::class, 'moduleid')->select('category_products.title', 'category_products.id')->where('module', '=', 'product')->join('category_products', 'category_products.id', '=', 'catalogues_relationships.catalogueid');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'productid');
    }
}
