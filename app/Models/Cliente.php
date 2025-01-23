<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    // Define the table associated with the model
    protected $table = 'cliente';

    // Define the primary key for the table
    protected $primaryKey = 'id';

    // Specify which attributes should be mass-assignable
    protected $fillable = ['cif', 'nombre', 'telefono', 'correo', 'cuenta_corriente', 'pais', 'moneda', 'importe_cuota_mensual'];

    // Method to get all clients
    public static function getAllClients()
    {
        return self::all();
    }

    // Method to get a client by ID
    public static function getClientById($id)
    {
        return self::find($id);
    }

    // Method to create a new client
    public static function createClient($data)
    {
        return self::create($data);
    }

    // Method to update a client by ID
    public static function updateClient($id, $data)
    {
        $client = self::find($id);
        if ($client) {
            $client->update($data);
            return $client;
        }
        return null;
    }

    // Method to delete a client by ID
    public static function deleteClient($id)
    {
        $client = self::find($id);
        if ($client) {
            $client->delete();
            return true;
        }
        return false;
    }
}