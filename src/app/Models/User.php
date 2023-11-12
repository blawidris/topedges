<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Wallet;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];


    public function wallet()
    {
        return $this->hasOne(Wallet::class, 'user_id');
    }

    public function userkyc()
    {
        return $this->hasOne(UserKYC::class, 'user_id');
    }

    public function referals()
    {
        return $this->hasMany(ReferalTracker::class, 'user_id');
    }

    public function transactions(){
        return $this->hasMany(Transaction::class, 'user_id');
    }

    public function updateProfile($data, $user_id){
        return $this->where('id', $user_id)->update($data);
    }

    public function transaction(){
        $this->belongsTo(Transaction::class);
    }

}
