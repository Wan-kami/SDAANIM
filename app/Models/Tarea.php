<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tarea'; 
    protected $primaryKey = 'Tar_id'; 
    public $timestamps = false; 

    protected $fillable = [
        'Tar_titulo',
        'Tar_descripcion',
        'Tar_fecha_asignacion',
        'Tar_fecha_limite',
        'Tar_estado',
        'Tar_comentario',
        'Usu_documento'
    ];
}