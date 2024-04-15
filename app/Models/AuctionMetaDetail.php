<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionMetaDetail extends Model
{
    use HasFactory;

    protected $table = 'auction_meta_detail';
    protected $fillable = ['auction_id','meta_key','meta_value'];

    public function metaInput(){
        return $this->belongsTo(MetaInput::class,'meta_key','slug');  
    }
}
