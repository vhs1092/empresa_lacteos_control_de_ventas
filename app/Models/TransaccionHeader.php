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

    /**
     * Get the post that owns the comment.
     */
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'id_cliente');
    }

    public function tipo()
    {
        return $this->belongsTo('App\Models\TipoTransaccion', 'id_tipo_transaccion');
    }

}
