<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuestaprofesor extends Model
{
    protected $table = 'respuestasprofesores';

    public function profesorObject() {
        return $this->belongsTo('App\User', 'profesor');
    }
    public function peticionesinformacionObject() {
        return $this->belongsTo('App\User', 'peticionesinformacion_id');
    }
}
