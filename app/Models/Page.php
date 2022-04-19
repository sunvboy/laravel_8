<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'image', 'page', 'description', 'meta_title', 'meta_description', 'userid_created', 'userid_updated', 'created_at', 'updated_at', 'publish', 'alanguage'
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'userid_created');
    }
}
