<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'fecha_hora',
        'departamentos_id',
        'descripcion',
        'users_id',
    ];

    /**
     * Get the phone associated with the user.
     */
    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'departamentos_id', 'id');
    }
    
    /**
     * Get the phone associated with the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function paginas() {
        return $this->hasMany(Pagina::class, 'archivos_id');
    }
}
