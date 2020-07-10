<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AlunoDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlunoRequest;
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
        $curso = Curso::all()->pluck('nome','id');
        return view('admin.aluno.form', compact('curso'));
    }

    public function store(AlunoRequest $request)
    {
        $aluno = AlunoService::store($request->all());

        if($aluno['status']){
            return redirect()->route('admin.aluno.index')
             ->withSucesso('aluno salvo com sucesso');
        }
        return back()->withInput()
            ->withFalha('Ocorreu erro ao salvar');
        
    }

    public function edit($id)
    {
        $aluno = AlunoService::getAlunoPorId($id);
        if ($aluno['status']) {
            return view('admin.aluno.form', [
                'aluno' => $aluno['aluno'],
                'curso' => $aluno['curso'],
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $aluno =  AlunoService::update($request->all(), $id);

        if ($aluno['status']){
            return redirect()->route('admin.aluno.index')
                    ->withSucesso('Aluno atualizada com sucesso');

        }
        return back()->withInput()
                ->withFalha('Ocorreu um erro ao atualizar');
    }

    public function destroy($id)
    {
        $aluno = AlunoService::destroy($id);

        if ($aluno['status']){
            return 'Aluno excluida com sucesso';
        }

        abort(403,'Erro ao excluir,' .$aluno['erro']);
    }

}
