<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKYC extends Model
{
    use HasFactory;

    protected $table = 'users_kyc';
    protected $primary = 'id';
    protected $fillable= [
        'user_id', 'identity_type',
        'identity_number',
        'identity_image',
        'status'
    ];

    protected function user(){
        return $this->belongsTo(User::class, 'id');
    }
}
