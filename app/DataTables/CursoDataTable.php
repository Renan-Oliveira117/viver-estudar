<?php
namespace App\DataTables;
use App\Models\Curso;
use App\Models\Professor;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CursoDataTable extends DataTable
{
   
    public function dataTable($query)
    {
        return datatables()
        ->eloquent($query)
        ->editColumn('created_at', function($curso){

            return $curso->created_at->format('d/m/Y');
        })
        ->addColumn('action', function($curso){

            $acoes = link_to(
                            route('admin.curso.edit', $curso),
                            'Editar',
                            ['class' => 'btn btn-sm btn-primary']
                            );
             $acoes .= FormFacade::button(
                'Excluir',
                ['class' =>
                    'btn btn-sm btn-danger ml-1',
                    'onclick' => "excluir('" . route('admin.curso.destroy', $curso) . "')" 
                    ]
            );
            return $acoes;
        })
        ->editColumn('professor_id',function($curso){
            return Professor::find($curso->professor_id)->nome;
        })
        ->editColumn('imagem', function ($curso) {
            return '<img style="height: 50px;" src="' . asset('imagens/' . $curso->imagem) . '" />';
        })
        ->rawColumns(['action', 'imagem']);

    }
  
    public function query(Curso $model)
    {
        return $model->newQuery();
    }
 
    public function html()
    {
        return $this->builder()
                    ->setTableId('curso-table')
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
            Column::make('carga_horaria')->title('Carga horaria'),
            Column::make('professor_id')->title('Professor'),
            Column::make('imagem'),
            Column::make('created_at')->title('Data de Criação'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
        ];
    }


    protected function filename()
    {
        return 'Curso_' . date('YmdHis');
    }
}
