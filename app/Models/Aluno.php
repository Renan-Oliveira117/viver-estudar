<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $guaded = ['id'];

    public function curso ()
    {
        return $this->hasOne(curso::class);
    }
}
