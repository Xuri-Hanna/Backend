<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanQuyen extends Model
{
    use HasFactory;

    protected $table = 'phan_quyen';
    protected $primaryKey = 'ma_phan_quyen';

    public $timestamps = false;
    protected $fillable = ['ma_nhan_vien', 'ma_quyen'];

    public function taiKhoan()
    {
        return $this->belongsTo(TaiKhoan::class, 'ma_nhan_vien');
    }

    public function quyen()
    {
        return $this->belongsTo(Quyen::class, 'ma_quyen');
    }
}
