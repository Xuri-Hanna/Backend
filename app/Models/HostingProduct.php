<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostingProduct extends Model
{
    use HasFactory;

    protected $table ='hosting_product';
    protected $fillable = [
         'plan', 'price', 'disk_space', 'bandwidth',
        'accounts_ftp', 'addon_domains', 'sub_domains',
    ];

    public function user() {
        return $this->belongsTo(KhachHang::class);
    }

}
