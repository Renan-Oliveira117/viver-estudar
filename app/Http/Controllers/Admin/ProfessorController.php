<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProfessorDataTable;
use App\Http\Controllers\Controller;
use App\Services\ProfessorService;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index(ProfessorDataTable $professorDataTable)
    {
        return $professorDataTable->render('admin.professor.index');
    }
    public function create()
    {
        return view('admin.professor.form');
    }
    public function store(Request $request)
    {
        $professor = ProfessorService::store($request->all());

        if($professor['status']){
            return redirect()->route('admin.professor.index')
             ->withSucesso('Professor salvo com sucesso');
        }
        return back()->withInput()
            ->withFalha('Ocorreu erro ao salvar');
        
    }
    public function edit($id)
    {
        $professor = ProfessorService::getAlunoPorId($id);

        if ($professor['status']){
            return view('admin.professor.form',[
                'professor' => $professor['professor']
            ]);
        }
        return back()->witnFalha('Ocorreu um erro ao selecionar a categoria');
    }
    public function update(Request $request, $id)
    {
        $professor =  ProfessorService::update($request->all(), $id);

        if ($professor['status']){
            return redirect()->route('admin.professor.index')
                    ->withSucesso('Professor atualizada com sucesso');

        }
        return back()->withInput()
                ->withFalha('Ocorreu um erro ao atualizar');
    }
    public function destroy($id)
    {
        $professor = ProfessorService::destroy($id);

        if ($professor['status']){
            return 'Professor excluida com sucesso';
        }

        abort(403,'Erro ao excluir,' .$professor['erro']);
    }
}
