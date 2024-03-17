<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Startauction extends Model
{
    use HasFactory;
    protected $table = 'start_auction';

    protected $fillable = [ 'category','sub_category','quality', 'bugiect','city','quantity','description'];

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

}
