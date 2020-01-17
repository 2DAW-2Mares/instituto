<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Materiamatriculada extends Model
{
    protected $table = "materiamatriculadas";

    public function usuarioObject()
    {
        return $this->belongsTo('App\User','alumno');
    }

    public function grupoObject()
    {
        return $this->belongsTo('App\Grupo', 'grupo');
    }
    public function materiaObject()
    {
        return $this->belongsTo('App\Materia', 'materia');
    }
=======
class Materiamatriculada extends Model {
    protected $table = "materiamatriculada";

    public function userObject() {
        return $this->belongsTo('\App\User', 'alumno');
    }

    public function grupoObject() {
        return $this->belongsTo('\App\Grupo', 'grupo');
    }

    public function materiaObject() {
        return $this->belongsTo('\App\Materia', 'materia');
    }

>>>>>>> ce7ae7b1a91cd601858f15a3a8a05a99fc87be17
}
