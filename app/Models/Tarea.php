<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasOne;

class Tarea extends Model
{
    // Define the table associated with the model
    protected $table = 'tarea';

    // Define the primary key for the table
    protected $primaryKey = 'id';

    // Specify which attributes should be mass-assignable
    protected $fillable = ['cliente', 'nombre_cliente', 'tel_contacto', 'descripcion', 'correo', 'direccion', 'poblacion', 'codigo_postal', 'provincia', 'estado', 'empleado', 'fecha_creacion', 'fecha_realizacion', 'anotaciones_anteriores', 'anotaciones_posteriores', 'ficheros'];


    // Method to update a client by ID
    public static function updateTarea($id, $data)
    {
        $tarea = self::find($id);
        if ($tarea) {
            $tarea->update($data);
            return $tarea;
        }
        return null;
    }

    // Method to delete a client by ID
    public static function deleteTarea($id)
    {
        $tarea = self::find($id);
        if ($tarea) {
            $tarea->delete();
            return true;
        }
        return false;
    }

    
    public function cliente(): HasOne
    {
        return $this->hasOne(Cliente::class, 'id', 'cliente');
    }

}
