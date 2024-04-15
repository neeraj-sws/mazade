<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetaInput extends Model
{
    use HasFactory;

    protected $table = 'meta_inputs';
    protected $fillable = [ 'category_id','subcat_id','title','description','slug'];
}
