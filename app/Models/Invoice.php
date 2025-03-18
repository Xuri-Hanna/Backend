<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'user_id', 'amount', 'status', 'payment_method', 'issued_at', 'due_date'];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function user() {
        return $this->belongsTo(KhachHang::class);
    }
}
