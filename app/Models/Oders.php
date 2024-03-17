<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class Oders extends Model
{
    use HasFactory;
    protected $table = 'orders';

    protected $fillable = [ 'category_id','companie_id','auction_id','price'];

    function CatId()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

      function AuId()
    {
        return $this->belongsTo(Auction::class,'auction_id');
    }

    function comid()
    {
        return $this->belongsTo(Companies::class,'companie_id');
    }
    
}
   