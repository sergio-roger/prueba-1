<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $filleable = ['cedula','nombres','apellidos','genero','telefono','correo','contrasena', 'token', 'foto','estado'];
    protected $hidden = ["contrasena"];

    //Relacion de uno a muchos
    public function convenios(){
        return $this->hasMany(convenios::class,'usuario_id');
    }

    public function becas_nivel(){
        return $this->hasMany(becas_nivel::class,'usuario_id');
    }

    public function interfaz_contenido(){
        return $this->hasMany(interfaz_contenido::class,'usuario_id');
    }

    public function historial_usuario(){
        return $this->hasMany(historial_usuario::class,'usuario_id');
    }

    //Relación muchos a muchos
    public function funcionalidad_usuario(){
        return $this ->belongsToMany(funcionalidad_usuario::class,'usuario_id');
    }

    //Relación muchos a muchos
    public function cargo_usuario(){
        return $this -> belongsToMany(cargo_usuario::class,'usuario_id');
    }
}
