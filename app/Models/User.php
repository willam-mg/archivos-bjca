<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    const ROL_ADMIN = 'administrador';
    const ROL_JEFE_ACADEMICO = 'jefe_academico';
    const ROL_CORDINADOR_CARRERA = 'cordinador_carrera';
    const ROL_DOCENTE = 'docente';
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'rol',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The append logic attributes accessors.
     *
     * @var array<string, string>
     */
    protected $appends = [
        'nombre_rol'
    ];

    public function getNombreRolAttribute() {
        switch ($this->rol) {
            case self::ROL_ADMIN:
                return 'Adminsitrador';
                break;
            case self::ROL_JEFE_ACADEMICO:
                return 'Jefe Academico';
                break;
            case self::ROL_CORDINADOR_CARRERA:
                return 'Cordinador de carrera';
                break;
            case self::ROL_DOCENTE:
                return 'Docente';
                break;
            default:
                return 'No asignado';
                break;
        }
    }
}
