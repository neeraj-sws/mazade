<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionSetting extends Model
{
    use HasFactory;
    protected $table = 'commission_settings';

    protected $fillable = ['category_id', 'commission'];

  
}

