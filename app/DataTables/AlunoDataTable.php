<?php
namespace App\DataTables;

use App\Models\Aluno;
use App\Models\Curso;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AlunoDataTable extends DataTable
{
   
    public function dataTable($query)
    {
        return datatables()
        ->eloquent($query)
        ->editColumn('created_at', function($aluno){

            return $aluno->created_at->format('d/m/Y');
        })
        ->addColumn('action', function($aluno){

            $acoes = link_to(
                            route('admin.aluno.edit', $aluno),
                            'Editar',
                            ['class' => 'btn btn-sm btn-primary']
                            );
             $acoes .= FormFacade::button(
                'Excluir',
                ['class' =>
                    'btn btn-sm btn-danger ml-1',
                    'onclick' => "excluir('" . route('admin.aluno.destroy', $aluno) . "')" 
                    ]
            );
            return $acoes;
        })
        ->editColumn('curso_id',function($aluno){
            return Curso::find($aluno->curso_id)->nome;
        })
        ->editColumn('imagem', function ($aluno) {
            return '<img style="height: 50px;" src="' . asset('imagens/' . $aluno->imagem) . '" />';
        })
        ->rawColumns(['action', 'imagem']);

    }
  
    public function query(Aluno $model)
    {
        return $model->newQuery();
    }
 
    public function html()
    {
        return $this->builder()
                    ->setTableId('aluno-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create')->text('Novo'),
                        Button::make('print'),
                     
                    )
                    ->parameters([
                        'language' => ['url'=>'//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json']
                    ]);
    }

    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('nome'),
            Column::make('cpf')->title('CPF'),
            Column::make('email'),
            Column::make('created_at')->title('Data de Criação'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
        ];
    }


    protected function filename()
    {
        return 'Aluno_' . date('YmdHis');
    }
}
