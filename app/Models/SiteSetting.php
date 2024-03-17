<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
    protected $table = 'site_setting';

    protected $fillable = [ 'name','icon'];

    function photo()
    {
        return $this->belongsTo(Upload::class, 'icon');
    }

    public $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->photo) {
            return url('uploads/site_image/'.$this->photo->file);
        }
        else{
            return null;
        }

    } 
}