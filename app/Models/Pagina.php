<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'numero',
        'descripcion',
        'imagen',
        'archivos_id',
    ];

    /**
     * Get the phone associated with the user.
     */
    public function archivo()
    {
        return $this->hasOne(Phone::class, 'archivos_id');
    }
}
