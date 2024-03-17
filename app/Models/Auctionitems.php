<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class Auctionitems extends Model
{
    use HasFactory;
    protected $table = 'auction_items';

    protected $fillable = [  'oder_id',  'auction_id','companie_id','category_id','price','status_bit'];

    function CatId()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    function AuId()
    {
        return $this->belongsTo(Auction::class,'auction_id');
    }

    function companyId()
    {
        return $this->belongsTo(Companies::class,'companie_id');
    }

    
}
