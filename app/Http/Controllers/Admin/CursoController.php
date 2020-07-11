<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CursoDataTable;
use App\Http\Controllers\Controller;
use App\Models\Professor;
use App\Services\CursoService;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(CursoDataTable $cursoDataTable)
    {
        return $cursoDataTable->render('admin.curso.index');
    }

    public function create()
    {
        $professor = Professor::all()->pluck('nome','id');
        return view('admin.curso.form', compact('professor'));
    }

    public function store(Request $request)
    { 
        $curso = CursoService::store($request->all());
                 
        if ($curso['status']){
          return redirect()->route('admin.curso.index')
                      ->withSucesso('Curso salvo com sucesso');
        }

        return back()->withInput()
                ->withFalha('Ocorreu um erro ao salvar');
        
    }

    public function edit($id)
    {
        $curso = CursoService::getCursoPorId($id);
        if ($curso['status']) {
            return view('admin.curso.form', [
                'curso' => $curso['curso'],
                'professor' => $curso['professor'],
            ]);
        }
    }

    public function update( Request $request, $id)
    {
        $curso = CursoService::update($request->all(), $id);
        if ($curso['status']) {
            return redirect()->route('admin.curso.index')
                    ->withSucesso('Curso salvo com sucesso');
        }
        return back()->withInput()
          ->withFalha('Ocorreu um erro ao salvar');
    }

    public function destroy($id)
    {
        $curso = CursoService::destroy($id);

        if ($curso['status']) {
            return 'Curso excluído com sucesso';
        }

        abort(403, 'Erro ao excluir, ' . $curso['erro']);
    }
}