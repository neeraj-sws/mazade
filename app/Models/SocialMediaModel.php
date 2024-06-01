<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class SocialMediaModel extends Model
{
    use HasFactory;
    protected $table = 'social_media';

    protected $fillable = [ 'title','link'];

    
}

  
   