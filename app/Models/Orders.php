<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [ 'category_id','company_id','auction_id','price','is_payment','code'];

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

    function cominfo()
    {
        return $this->belongsTo(CompanyInfo::class,'company_id','user_id');
    }
    function transaction()
    {
        return $this->hasMany(Transaction::class,'order_id');
    }


}
   