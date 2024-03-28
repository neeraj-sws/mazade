<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class WithdrawHistoryDetails extends Model
{
    use HasFactory;
    protected $table = 'withdraw_history_details';

    protected $fillable = [ 'type','withdraw_id','email','banck_acc_no','bank_name','bank_branch','Crypto_address'];

    function CatId()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }

    function WithdrawHistory()
    {
        return $this->belongsTo(WithdrawHistory::class);
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
   