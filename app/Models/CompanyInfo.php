<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class CompanyInfo extends Model
{
    use HasFactory;

  //  use AuthenticableTrait;

    protected $table = 'company_info';

    protected $fillable = [
        'user_id',
        'company_name',
        'compan_phone',
        'address',
        'commercial_register',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function auctionItem()
    {
        return $this->hasMany(Auctionitems::class,'company_id');
    }

}

