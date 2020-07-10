<?php

namespace App\Http\Controllers\Publico;

use App\Http\Controllers\Controller;
use App\Services\CursoService;
use Illuminate\Http\Request;

class TelaController extends Controller
{
    public function index()
    {
        return view ('publico.inicio',[
            'cursos'=> CursoService::listaCursos()
        ]);
    }
}
