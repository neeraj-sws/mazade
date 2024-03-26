<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class WithdrawHistory extends Model
{
    use HasFactory;
    protected $table = 'withdraw_history';

    protected $fillable = [ 'withdraw_amout','company_id','auction_id','payment_method','type'];

    function CatId()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }

      function AuId()
    {
        return $this->belongsTo(Auction::class,'auction_id');
    }

    function Auction()
    {
        return $this->belongsTo(Auctionitems::class);
    }

    function comid()
    {
        return $this->belongsTo(Companies::class,'company_id');
    }
    
}
   