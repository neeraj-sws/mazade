<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletHistory extends Model
{
    use HasFactory;

    protected $table = 'wallet_history';

    protected $fillable =['amount','status','user_id'];

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
