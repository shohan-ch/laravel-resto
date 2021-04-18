<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{


    use HasFactory;

    protected $fillable = ['category_id', 'name', 'description', 'status', 'price'];


    public function category()
    {

        return $this->belongsTo(category::class);
    }
}