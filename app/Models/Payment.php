<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [ 'name','auction_id','card_number','security_code','expiration_date','amount'];

    function CatId()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    function Userid()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    function transction()
    {
        return $this->hasMany(Transaction::class,'payment_id');
    }
}
