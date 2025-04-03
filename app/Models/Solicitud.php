<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Solicitud extends Model
{
    use HasFactory;
    protected $fillable = [
        'pedido',
        'status',
        'user_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
