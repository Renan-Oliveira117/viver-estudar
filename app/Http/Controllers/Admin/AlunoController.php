<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AlunoDataTable;
use App\Http\Controllers\Controller;
use App\Models\Aluno;
use App\Models\Curso;
use App\Services\AlunoService;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(AlunoDataTable $alunoDataTable)
    {
        return $alunoDataTable->render('admin.aluno.index');
    }
    public function create()
    {
        $curso = Curso::all()->pluck('nome');
        return view('admin.aluno.form', compact('curso'));
    }

    public function store(Request $request)
    { 
        $aluno = AlunoService::store($request->all());
           
        if ($aluno['status']){
          return redirect()->route('admin.aluno.index')
                      ->withSucesso('aluno salvo com sucesso');
        }
        return back()->withInput()
                ->withFalha('Ocorreu um erro ao salvar');     
    }
    
    public function edit($id)
    {
        $curso = AlunoService::getAlunoPorId($id);
        if ($curso['status']) {
            return view('admin.aluno.form', [
                'curso' => $curso['curso'],
                'professor' => $curso['professor'],
            ]);
        }
    }
    public function update( Request $request, $id)
    {
        $curso = AlunoService::update($request->all(), $id);
        if ($curso['status']) {
            return redirect()->route('admin.aluno.index')
                    ->withSucesso('Aluno salvo com sucesso');
        }
        return back()->withInput()
          ->withFalha('Ocorreu um erro ao salvar');
    }
    //
}
