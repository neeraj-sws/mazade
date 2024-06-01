<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class Home extends Model
{
    use HasFactory;
    protected $table = 'home';

    protected $fillable = [ 'title','icon','description'];

   

    function photo()
    {
        return $this->belongsTo(Upload::class, 'icon');
    }

   
    public $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->photo) {
            return url('/uploads/category/'.$this->photo->file);
        }
        else{
            return null;
        }

    }
    
    
    
}

  
   