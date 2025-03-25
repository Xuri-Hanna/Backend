<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'sdt', 'dia_chi', 'service_id','discount_id',
        'service_type', 'total_price', 'status', 'duration_months'
    ];

    public function user() {
        return $this->belongsTo(KhachHang::class);
    }

    public function discount() {
        return $this->belongsTo(Discount::class);
    }
}

