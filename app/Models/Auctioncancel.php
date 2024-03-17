<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auctioncancel extends Model
{
    use HasFactory;
    protected $table = 'auctioncancel';

    protected $fillable = [ 'category_id','company_id','username', 'Paid','reason'];

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

