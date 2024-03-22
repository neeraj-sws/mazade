<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';

    protected $fillable = [ 'title','icon','description', 'category_id','status' , 'slug'];

    function photo()
    {
        return $this->belongsTo(Upload::class, 'icon');
    }

    function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }


    function CatId()
    {
        return $this->belongsTo(Category::class,'category_id');
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
