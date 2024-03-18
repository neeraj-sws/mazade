<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class Company_info extends Model
{
    use HasFactory;

  //  use AuthenticableTrait;

    protected $table = 'company_info';

    protected $fillable = [
        'user_id',
        'companyname',
        'companphone',
        'address',
        'commercialregister',
    ];

}

