<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =  ['name' , 'description', 'image', 'imgurl', 'price' , 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function cart(){
        return $this->hasOne(Cart::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
