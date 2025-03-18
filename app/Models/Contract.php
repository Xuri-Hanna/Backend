<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'order_id', 'service_type', 'start_date', 'end_date', 'status'
    ];

    public function user() {
        return $this->belongsTo(KhachHang::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
