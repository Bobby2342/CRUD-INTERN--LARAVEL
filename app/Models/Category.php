<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =  ['name' , 'image', 'displayname'];

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id'); //category id has many product attributes
    }

}
