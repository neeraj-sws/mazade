<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Activitylog extends Model
{
    use HasFactory;
    protected $table = 'activity_logs';

    protected $fillable = [ 'buyer_id',  'seller_id', 'category_id', 'receive', 'sender','message','auction_id'];

    function Buyer()
    {
        return $this->belongsTo(User::class,'buyer_id');
    }

    function Seller()
    {
        return $this->belongsTo(User::class,'seller_id');
    }

    function Ctegory()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

}
    