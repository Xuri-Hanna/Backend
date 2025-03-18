<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainProduct extends Model
{
    use HasFactory;

    protected $table = 'domain_product';

    protected $fillable = [
        'domain_name', 'price_start', 'price', 'domain_type',
    ];

    public function user() {
        return $this->belongsTo(KhachHang::class);
    }
}
