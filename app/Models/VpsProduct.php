<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VpsProduct extends Model
{
    use HasFactory;

    protected $table ='vps_product';
    protected $fillable = ['plan', 'cpu', 'ram', 'storage', 'bandwidth', 'os','price'];

    public function user() {
        return $this->belongsTo(KhachHang::class);
    }
}
