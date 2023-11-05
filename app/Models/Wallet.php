<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'wallet_address',
        'current_balance', 'daily_earning', 'next_mine_date'
    ];



    public function user(){
        return $this->belongsTo(User::class, 'id');
    }

    public function fetch($id){
        return $this->where('id', $id)->first();
    }

    public function fetchByUserId($id){
        return $this->where('user_id', $id)->first();

    }

    public function updateByUserId($id, $data){
        return $this->where('user_id', $id)->update($data);
    }


    public function updateById($id, $data){
        $this->where('id', $id)->update($data);

        return true;
    }

    public function isPending(){
        return $this->status;
    }
}
