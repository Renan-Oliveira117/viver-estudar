<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $guarded = ['id'];

    public function professor (){
        return $this->hasOne(Professsor::class);
    }
    public function aluno ()
    {
        return $this->belongsTo(Aluno::class);
    }
}
