<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaction';

    protected $fillable = [ 'company_id','payment_id','type','withdraw_id','transaction_detail','transaction_id','order_id'];

    function CatId()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }

      function AuId()
    {
        return $this->belongsTo(Auction::class,'auction_id');
    }

    function WithdrawDetails()
    {
        return $this->hasMany(WithdrawHistoryDetails::class,'withdraw_id');
    }

    function Payment()
    {
        return $this->belongsTo(Payment::class);
    }

    function Withdraw()
    {
        return $this->belongsTo(WithdrawHistory::class);
    }

    function comid()
    {
        return $this->belongsTo(Companies::class,'company_id');
    }
    
     function order()
    {
        return $this->belongsTo(Orders::class,'order_id');
    }
    
}
   