<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    // Define the table associated with the model
    protected $table = 'empleado';

    // Define the primary key for the table
    protected $primaryKey = 'id';

    // Specify which attributes should be mass-assignable
    protected $fillable = ['dni', 'nombre', 'correo', 'usuario', 'clave', 'telefono', 'direccion', 'fecha_alta', 'tipo'];


    // Method to update a client by ID
    public static function updateEmpleado($id, $data)
    {
        $empleado = self::find($id);
        if ($empleado) {
            $empleado->update($data);
            return $empleado;
        }
        return null;
    }

    // Method to delete a client by ID
    public static function deleteEmpleado($id)
    {
        $empleado = self::find($id);
        if ($empleado) {
            $empleado->delete();
            return true;
        }
        return false;
    }
}