<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_image',
      
       
    ];
    public function riletiontoCategory(){


        return $this->belongsTo(Category::class,'category_id');
    }

    public function  riletionTosSubcategory(){
        return $this->belongsTo(Subcategory::class,'sub_category_id');
    }
}
