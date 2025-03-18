<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainAccount extends Model
{
    use HasFactory;

    protected $table = 'domain_accounts';

    protected $fillable = ['domain_id', 'registrar_panel', 'username', 'password'];

    public function domain()
    {
        return $this->belongsTo(DomainProduct::class, 'domain_id');
    }
}
