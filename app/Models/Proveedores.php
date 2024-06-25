<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    use HasFactory;

    protected $table = 'proveedores';
    protected $fillable = ['id','razon_social','telefono','domicilio_fiscal','direccion'];
    protected $dates = ['delete_at'];
}
