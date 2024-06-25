<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "productos";
    protected $primaryKey = "id";
    protected $fillable = ['id_categoria','nombre','img','stock','marca','descripcion','precio_max','precio_min','cantidad','presentacion'];
    protected $dates = ['delete_at'];

    public function categoria(){
        return $this->hasOne('App\Models\Category','id','id_categoria');
    }

}
