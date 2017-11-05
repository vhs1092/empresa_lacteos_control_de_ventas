<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{

protected $table = 'producto';

    protected $fillable = ['name', 'description', 'id_tipo_producto', 'stock'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
