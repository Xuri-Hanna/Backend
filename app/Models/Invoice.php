<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'user_id', 'amount', 'status', 'issued_at', 'due_date'];
    protected $attributes =[
        'payment_method' => 'QR PAY',
        'status' => 'unpaid',
    ];
    protected $casts = [
        'issued_at' => 'date',
        'due_date' => 'date',
    ];

    public function order() {
        return $this->belongsTo(Order::class,);
    }

    public function user() {
        return $this->belongsTo(KhachHang::class,);
    }
}
