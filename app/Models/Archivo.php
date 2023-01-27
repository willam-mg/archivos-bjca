<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $table = 'archivos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'titulo',
        'fecha_hora',
        'descripcion',
        'fecha_documento',
        'resolucion_ministerial',
        'cife',
        'fecha_emision',
        'ano',
        'departamento_id',
        'tipo_documento_id',
        'user_id'
    ];

    /**
     * Get the phone associated with the user.
     */
    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_documento_id', 'id');
    }
    
    /**
     * Get the phone associated with the user.
     */
    public function seccion()
    {
        return $this->belongsTo(Seccion::class, 'departamento_id', 'id');
    }
    
    /**
     * Get the phone associated with the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function paginas() {
        return $this->hasMany(Pagina::class, 'archivo_id');
    }
}
