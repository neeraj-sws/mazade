<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class About extends Model
{
    use HasFactory;
    protected $table = 'about';

    protected $fillable = [ 'title','icon','description','header_image'];

   

    function photo()
    {
        return $this->belongsTo(Upload::class, 'icon');
    }

    function headerImage()
    {
        return $this->belongsTo(Upload::class, 'header_image');
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

  
   