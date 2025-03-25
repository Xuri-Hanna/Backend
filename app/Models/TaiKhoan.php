<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'tai_khoan';
    protected $primaryKey = 'ma_nhan_vien';
    public $timestamps = false;

    protected $fillable = ['ma_nhan_vien', 'hoten', 'email', 'password', 'chuc_vu', 'status'];

    public function phanQuyen()
    {
        return $this->hasMany(PhanQuyen::class, 'ma_nhan_vien');
    }
}


