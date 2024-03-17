<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Auth\Authenticatable as AuthenticableTrait;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Upload;

class Companies extends Authenticatable
{
    use HasFactory;

  //  use AuthenticableTrait;

    protected $table = 'companies';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'register',
        'status',
        'file_id',
        'is_bid_add'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    function photo()
    {
        return $this->belongsTo(Upload::class, 'file_id');
    }

    public $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->photo) {
            return url('/uploads/services/'.$this->photo->file);
        }
        else{
            return null;
        }

    }
}

