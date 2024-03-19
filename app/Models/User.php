<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Upload;

class User extends Authenticatable
{
    protected $table = 'users';
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'last_name',
        'password',
        'latitude',
        'longitude',
        'address',
        'mobile_number',
        'otp',
        'expire_otp_at',
        'social_login',
        'state_id',
        'city_id',
        'image',
        'status',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    function favUdata()
    {
        return $this->hasMany(Favorite::class,'client_id');
    }

    public function userAppointment()
    {
        return $this->hasMany(Appointment::class,'user_id');
    }

    function photo()
    {
        return $this->belongsTo(Upload::class, 'image');
    }

      

    public $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
      //  echo $this->photo->file;
        if ($this->photo) {
            return url('/uploads/services/'.$this->photo->file);
        }
        else{
            return null;
        }

    }

}
