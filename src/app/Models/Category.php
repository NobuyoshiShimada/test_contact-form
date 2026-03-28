<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['category_name'];
    protected $appends = ['name'];

    public function getNameAttribute()
    {
        return $this->attributes['category_name'] ?? null;
    }
}
