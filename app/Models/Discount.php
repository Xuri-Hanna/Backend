<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Discount extends Model
{
    use HasFactory;

    public $incrementing = false; // Tắt tự động tăng id
    protected $keyType = 'string'; // Chuyển id sang kiểu string

    protected $fillable = ['id', 'percentage', 'expiry_date', 'discount_type'];

    // Hàm tạo ID tự động theo loại giảm giá
    public static function generateId($type)
    {
        $prefix = ($type == 'manual') ? 'KM' : 'KV';
        $randomNumber = str_pad(rand(1, 99), 2, '0', STR_PAD_LEFT);
        return $prefix . $randomNumber;
    }
}
