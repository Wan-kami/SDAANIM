<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table = 'tarea'; // importante
    public $timestamps = false; // si no tienes created_at
}