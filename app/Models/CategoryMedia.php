<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMedia extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'userid_created');
    }
    public function listMedia()
    {
        return $this->hasMany(Catalogues_relationships::class, 'catalogueid', 'id')->where('module', '=', 'media');
    }
}
