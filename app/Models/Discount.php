<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'percentage', 'expiry_date', 'discount_type'];

    public static function generateCode($type)
    {
        $prefix = ($type == 'manual') ? 'KM' : 'KV';
        $randomNumber = str_pad(rand(1, 99), 2, '0', STR_PAD_LEFT);
        return $prefix . $randomNumber;
    }
}
