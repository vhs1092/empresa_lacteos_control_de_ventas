<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoTransaccion extends Model
{
    //
    protected $table = 'tipo_transaccion';

    protected $fillable = ['name', 'description', 'tipo', 'maneja_cliente', 'correlativo', 'status'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
