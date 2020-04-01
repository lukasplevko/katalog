<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oblubene extends Model
{
    protected $table = 'oblubene';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
