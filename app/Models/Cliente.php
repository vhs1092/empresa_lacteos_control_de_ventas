<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

protected $table = 'producto';

    protected $fillable = ['name', 'description', 'id_tipo_producto', 'stock'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}
