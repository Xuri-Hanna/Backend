<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostingAccount extends Model
{
    use HasFactory;

    protected $table = 'hosting_accounts';

    protected $fillable = ['hosting_id', 'username', 'password', 'control_panel'];

    public function hosting()
    {
        return $this->belongsTo(HostingProduct::class, 'hosting_id');
    }
}
