<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [ 'category_id','auction_id','user_id','code','amount'];

    function CatId()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    function Userid()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
