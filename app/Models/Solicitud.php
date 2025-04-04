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

    //relacionamos con la tabla de solicitud_user
    public function solicitudUser()
    {
        return $this->belongsToMany(User::class, 'solicitud_user');
    }
}
