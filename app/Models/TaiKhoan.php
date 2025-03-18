<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;

    protected $table = 'tai_khoan';

    protected $fillable = [
        'ma_nhan_vien', 'email', 'password', 'status', 'chuc_vu', 'hoten'
    ];

}

