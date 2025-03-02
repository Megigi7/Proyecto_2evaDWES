<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Control_cuota;

class Cuota extends Model
{
    // Define the table associated with the model
    protected $table = 'cuota';

    // Define the primary key for the table
    protected $primaryKey = 'id';

    // Specify which attributes should be mass-assignable
    protected $fillable = ['cliente', 'concepto', 'fecha_emision', 'importe', 'pagada', 'fecha_pago', 'importe_EUR','notas', 'created_at', 'updated_at'];

    //::all ::find($id) ::create($data); 
    // PRIMERO FIND $cuota->update($data) $cuota->delete();

    // Method to update a cuota by ID
    public static function updateCuota($id, $data){
        $cuota = self::find($id);
        if ($cuota) {
            $cuota->update($data);
            return $cuota;
        }
        return null;
    }

    // Method to delete a cuota by ID
    public static function deleteCuota($id){
        $cuota = self::find($id);
        if ($cuota) {
            $cuota->delete();
            return true;
        }
        return false;
    }

    public static function getRemesa($concepto){

    }


    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id', 'cliente');
    }
}