<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model{
    protected $table = 'estado';
    protected $fillable = ['clave','estado'];

    public static function getAllEstados(){
        return self::all();
    }

    public static function getEstadoByClave($clave){
        // $email = DB::table('users')->;
        return self::where('clave', $clave)->first();
    }

}