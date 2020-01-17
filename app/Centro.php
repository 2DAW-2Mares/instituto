<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    /**
     * Get the coordinador that owns the phone.
     */
    public function coordinadorObject()
    {
        return $this->belongsTo('App\User', 'coordinador');
    }

    /**
     * Get the Anyosescolares that owns the phone.
     */
    public function anyosescolares()
    {
        return $this->hasMany('App\Anyoescolar', 'centro');
    }

}
