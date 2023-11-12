<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferalTracker extends Model
{
    use HasFactory;

    protected $primaryKey ='id';
    protected $table = 'referal_trackers';
    protected $fillable = [
        'user_id', 'referred_user_id', 'referal_bonus'
    ];

    protected function user(){
        return $this->belongsTo(User::class, 'id');
    }


    public function sumAllByUserId($id){
        return $this->where('user_id', $id)->sum('referal_bonus');
    }

    public function getByReferedUserId($id){
        return $this->where('referred_user_id', $id)->first();
    }

    function updateById($id, $data){
        return $this->where('id', $id)->update($data);
    }
}
