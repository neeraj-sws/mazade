<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [ 'title','icon','description','status','slug'];

    function sub_category()
    {
        return $this->hasMany(SubCategory::class,'category_id');
    }

    function photo()
    {
        return $this->belongsTo(Upload::class, 'icon');
    }

    function servicesPrice()
    {
        return $this->hasMany(ClientServicePrice::class, 'category_id');
    }

    public $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->photo) {
            return url('/uploads/category/'.$this->photo->file);
        }
        else{
            return null;
        }

    }
    
    public function sellerCategory(){
        return $this->hasOne(SellerCategory::class,'categories_id');
    }
    
}

  
   