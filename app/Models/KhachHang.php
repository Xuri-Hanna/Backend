<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    protected $table ='khach_hang';
    protected $fillable = ['name', 'email', 'dia_chi', 'sdt'];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}

