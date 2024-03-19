<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    
    use HasFactory;
    protected $table = 'reviews';

    protected $fillable = [ 'ratings','title','email','discription', 'category_id' , 'auction_id' , 'companie_id'];
}
