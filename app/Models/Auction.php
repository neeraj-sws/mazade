<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Auction extends Model
{
    use HasFactory;
    protected $table = 'auction';

    protected $fillable = [ 'oder_id',  'title','category','sub_category','quality', 'budget','city','quantity','image','message','status','start_time' , 'end_time','user_id'];

    function CatId()
    {
        return $this->belongsTo(Category::class,'category');
    }

    function subcatid()
    {
        return $this->belongsTo(SubCategory::class,'sub_category');
    }

    function city()
    {
        return $this->belongsTo(City::class,'city');
    }
    
    function auctionItemPrice()
    {
        return $this->belongsTo(Auctionitems::class,'id');
    }

    function Order()
    {
        return $this->belongsTo(Orders::class,'id','auction_id');
    }

    function status_id()
    {
        return $this->belongsTo(Status::class,'status');
    }


    function auctionItem()
    {
        return $this->hasMany(Auctionitems::class,'auction_id');
    }


    public static function latestBid($aid)
    {
        $bid = Auctionitems::where('auction_id', $aid)->where('is_cancel',0)->latest()->first();

        if ($bid) {
            return $bid->price;
        } else {
            return null; // Or any other appropriate value or action if no bid is found
        }
    }

    public function auctionMetaDatails()
    {
        return $this->hasMany(AuctionMetaDetail::class, 'auction_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
    