<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

protected $table = 'cliente';

    protected $fillable = ['name', 'razon_social', 'nit', 'address', 'telephone', 'status'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

}