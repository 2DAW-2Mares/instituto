<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faltaalumno extends Model
{
protected $table = "faltasalumnos";

protected $fillable = ["idfaltasalumno", "alumno", "asiste", "retraso", "justificada", "periodoclase_id"];
protected $primaryKey = 'idfaltasalumno'; 
public function userObject() {
    return $this->belongsTo('\App\User', 'alumno');
}

public function periodoClaseObject() {
    return $this->belongsTo('\App\Periodoclase', 'periodoclase_id');
}

}
