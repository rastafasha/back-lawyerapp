<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudUser extends Model
{
    use HasFactory;

    protected $table = 'solicitud_user';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'solicitud_id'
    ];
}
