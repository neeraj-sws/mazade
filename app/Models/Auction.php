<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Auction extends Model
{
    use HasFactory;
    protected $table = 'auction';

    protected $fillable = [ 'oder_id',  'name','category','sub_category','quality', 'budget','city','quantity','image','description','status'];

    function CatId()
    {
        return $this->belongsTo(Category::class,'category');
    }

    function subcatid()
    {
        return $this->belongsTo(SubCategory::class,'sub_category');
    }

    function city()
    {
        return $this->belongsTo(City::class,'city');
    }

    function status_id()
    {
        return $this->belongsTo(Status::class,'status');
    }

}
    