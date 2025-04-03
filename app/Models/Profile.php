<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "speciality_id",
        "cliente_id",
        'nombre',
        'surname',
        'email',
        'direccion',
        'pais',
        'estado',
        'ciudad',
        'telhome',
        'telmovil',
        'redessociales', //json
        'precios', //json
        'avatar',
        'status',
        'rating',
        'description',
    ];

    const VERIFIED = 'VERIFIED';
    const PENDING = 'PENDING';
    const REJECTED = 'REJECTED';
    const PUBLISHED = 'PUBLISHED';

    /*
    |--------------------------------------------------------------------------
    | functions
    |--------------------------------------------------------------------------
    */

    public function scopeForMember(Builder $builder)
    {
        return $builder
            ->where("user_id", auth()->id())
            ->get();
    }

    public function scopeForPublic(Builder $builder)
    {
        $builder->where("status", Profile::PUBLISHED);
        return $builder->get();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function users(){
        return $this->belongsTo(User::class, 'id');
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'post_id');
    }
    public function clientes()
    {
        return $this->hasMany(User::class, 'cliente_id');
    }

    public function specialities()
    {
        return $this->hasOne(Speciality::class, 'speciality_id');
    }

}
