<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VpsAccount extends Model
{
    use HasFactory;

    protected $table = 'vps_accounts';

    protected $fillable = ['vps_id', 'ip_address', 'username', 'password', 'os'];

    public function vps()
    {
        return $this->belongsTo(VPSProduct::class, 'vps_id');
    }
}
