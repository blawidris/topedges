<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        "payment_id",
        "payment_status",
        "pay_address",
        "price_amount",
        "pay_amount",
        "order_id",
        "order_description",
        "purchase_id",
        "smart_contract",
        "expiration_estimate_date",
        'status',
        'type'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function saveTransaction($data){
        $this->create($data);
    }

    function fetch($id){
        return $this->where('id', $id)->first();
    }

    function paginateByUserId($id, $limit){
        return $this->orderBy('created_at', 'desc')->where('user_id', $id)->paginate($limit);
    }

    function sumTotalByType($id, $type){
        return $this->where('user_id', $id)->where('type', $type)->sum('price_amount');
    }
    function sumRecentByType($id, $type){
        return $this->where('user_id', $id)->where('type', $type)->where('status', 0)->sum('price_amount');
    }

    public function withdraw(){
        return $this->where('type', 'withdraw')->sum('price_amount');
    }
}
