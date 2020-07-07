<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $guarded = ['id'];

    public function curso (){
        return $this->belongsTo(Curso::class);
    }
}
