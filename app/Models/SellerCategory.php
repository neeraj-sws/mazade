<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerCategory extends Model
{
    
    use HasFactory;
    protected $table = 'seller_categories';

    protected $fillable = [ 'seller_id','categories_id','category_level','status'];


    function category()
    {   
        return $this->belongsTo(Category::class,'categories_id');
    }
    function seller()
    {   
        return $this->belongsTo(User::class,'seller_id');
    }
    
}
