<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Bider extends Model
{
    use HasFactory;
    protected $table = 'biders';

    protected $fillable = [ 'auction_id',  'seller_id'];

    function User()
    {
        return $this->belongsTo(User::class,'buyer_id');
    }

}
    