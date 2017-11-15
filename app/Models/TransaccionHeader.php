<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaccionHeader extends Model
{
    //
    protected $table = 'transaccion_header';

    protected $fillable = ['numero', 'observaciones', 'fecha', 'id_tipo_transaccion', 'id_cliente', 'status'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
