<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use  Notifiable;
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // los datos que se insertaran despues
        'name',
        'email',
        'password',
        'role',
        'image',
        'state_id',
        'country_id',
        'city_id'

    ];
    /**
     * Get the post that owns the comment.
     */
    public function state()
    {
         $this->belongsTo(State::class);

    }
    public function country()
    {
         $this->belongsTo(Country::class);

    }
    public function city()
    {
         $this->belongsTo(City::class);

    }

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
    ];

    public function setPasswordAttribute($password)
    {
        // = bcrypt($value){}.  --> sirve para poder modificar la password y encriptarla
        $this->attributes['password'] = Hash::needsRehash($password) ? Hash::make($password) : $password;
    }
}
