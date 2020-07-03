<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedor';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'nombreEmpresa',
        'ruc',
        'direccion',
        'telefono',
        'email',
    ];

    protected $guarded = [];
}
