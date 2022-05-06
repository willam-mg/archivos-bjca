<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagina extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'numero',
        'descripcion',
        'imagen',
        'archivo_id',
    ];

    /**
     * Get the phone associated with the user.
     */
    public function archivo()
    {
        return $this->hasOne(Phone::class, 'archivo_id');
    }
}
