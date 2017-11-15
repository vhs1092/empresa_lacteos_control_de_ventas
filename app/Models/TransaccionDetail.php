<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaccionHeader extends Model
{
    //
    protected $table = 'transaccion_detail';

    protected $fillable = ['id_tipo_transaccion', 'numero', 'id_producto', 'cantidad', 'status'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
