<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{

protected $table = 'tipo_producto';

    protected $fillable = ['name', 'description'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
