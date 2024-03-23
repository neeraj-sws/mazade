<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class Auctionitems extends Model
{
    use HasFactory;
    protected $table = 'auction_items';

    protected $fillable = [  'oder_id',  'auction_id','company_id','category_id','price','status_bit'];

    function CatId()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    function Auction()
    {
        return $this->belongsTo(Auction::class);
    }

    function companyId()
    {   
        return $this->belongsTo(CompanyInfo::class,'company_id','user_id');
    }

    
}
