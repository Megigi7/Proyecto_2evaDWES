<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    // Define the table associated with the model
    protected $table = 'cliente';

    // Define the primary key for the table
    protected $primaryKey = 'id';

    // Specify which attributes should be mass-assignable
    protected $fillable = ['cif', 'nombre', 'telefono', 'correo', 'cuenta_corriente', 'pais', 'moneda', 'importe_cuota_mensual'];

    //::all ::find($id) ::create($data); 
    // PRIMERO FIND $client->update($data) $client->delete();

    // Method to update a client by ID
    public static function updateCliente($id, $data){
        $client = self::find($id);
        if ($client) {
            $client->update($data);
            return $client;
        }
        return null;
    }

    // Method to delete a client by ID
    public static function deleteCliente($id){
        $client = self::find($id);
        if ($client) {
            $client->delete();
            return true;
        }
        return false;
    }

    // Has one pais
    public function pais(): HasOne
    {
        return $this->hasOne(Pais::class, 'pais', 'codigo_iso');
    }

        // Has many cuotas
    public function cuota(): HasMany
    {
        return $this->hasMany(Cuota::class, 'id', 'cuota');
    }

    public function tarea(): HasMany
    {
        return $this->hasMany(Tarea::class, 'id', 'cliente');
    }

}