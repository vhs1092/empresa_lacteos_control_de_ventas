<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

protected $table = 'producto';

    protected $fillable = ['name', 'description', 'id_tipo_producto', 'stock', 'unidad', 'status', 'weight'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the post that owns the comment.
     */
    public function tipo()
    {
        return $this->belongsTo('App\Models\TipoProducto', 'id_tipo_producto');
    }

}
