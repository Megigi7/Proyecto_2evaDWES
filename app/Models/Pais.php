<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model{
    protected $table = 'paises';
    protected $primaryKey = 'codigo_iso';
    protected $fillable = ['nombre', 'currency'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'pais', 'codigo_iso');
    }


}