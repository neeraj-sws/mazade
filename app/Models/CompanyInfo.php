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
        'image',
        'commercial_register',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function Auctionitems()
    {
        return $this->hasMany(Auctionitems::class,'company_id,');
    }

    function companyId()
    {   
        return $this->belongsTo(CompanyInfo::class,'company_id','user_id');
    }

    function photo()
    {
        return $this->belongsTo(Upload::class, 'image');
    }

    public $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
      //  echo $this->photo->file;
        if ($this->photo) {
            return url('/uploads/company_profile/'.$this->photo->file);
        }
        else{
            return null;
        }

    }

}

