<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'slug', 'catalogueid', 'catalogue', 'image', 'content', 'description', 'meta_title', 'meta_description', 'userid_created', 'userid_updated', 'created_at', 'updated_at', 'publish', 'order', 'alanguage'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'userid_created');
    }

    public function relationships()
    {
        return $this->hasMany(Catalogues_relationships::class, 'moduleid', 'id')->select('category_articles.title', 'category_articles.id')->where('module', '=', 'article')->join('category_articles', 'category_articles.id', '=', 'catalogues_relationships.catalogueid');
    }
    public function tags()
    {
        return $this->hasMany(Tags_relationship::class, 'moduleid', 'id')->select('tagid')->where('module', '=', 'articles');
    }
}
