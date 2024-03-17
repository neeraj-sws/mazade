<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finishedauctions extends Model
{
    use HasFactory;
    protected $table = 'finishedauctions';

    protected $fillable = [ 'category_id','company_id','username', 'Paid'];

   

    function CatId()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    function comid()
    {
        return $this->belongsTo(Companies::class,'company_id');
    }

    function Userid()
    {
        return $this->belongsTo(User::class,'username');
    }

}

