<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model{
    protected $table = 'provincia';
    protected $fillable = ['codigo','nombre'];

    public static function getAllProvincias(){
        return self::all();
    }


    public static function getProvinciaById($id){
        return self::find($id);
    }

    public static function createProvincia($data){
        return self::create($data);
    }

    public static function updateProvincia($id, $data){
        $provincia = self::find($id);
        if ($provincia) {
            $provincia->update($data);
            return $provincia;
        }
        return null;
    }

    public static function deleteProvincia($id){
        $provincia = self::find($id);
        if ($provincia) {
            $provincia->delete();
            return true;
        }
        return false;
    }
}