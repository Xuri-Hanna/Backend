<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quyen extends Model
{
    use HasFactory;

    protected $table = 'quyen';

    protected $fillable = ['ma_quyen', 'ten_quyen'];

}

