<?php

namespace App\DataTables;

use App\Models\Professor;
use Collective\Html\FormFacade;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProfessorDataTable extends DataTable
{
   
    public function dataTable($query)
    {
        return datatables()
        ->eloquent($query)
        ->editColumn('created_at', function($professor){

            return $professor->created_at->format('d/m/Y');
        })
        ->addColumn('action', function($professor){

            $acoes = link_to(
                            route('admin.professor.edit', $professor),
                            'Editar',
                            ['class' => 'btn btn-sm btn-primary']
                            );
             $acoes .= FormFacade::button(
                'Excluir',
                ['class' =>
                    'btn btn-sm btn-danger ml-1',
                    'onclick' => "excluir('" . route('admin.professor.destroy', $professor) . "')" 
                    ]
            );
            return $acoes;
        });
    }

   
    public function query(Professor $model)
    {
        return $model->newQuery();
    }


    public function html()
    {
        return $this->builder()
                    ->setTableId('professor-table')
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
            Column::make('telefone'),
            Column::make('cidade'),
            Column::make('bairro'),
            Column::make('created_at')->title('Data de Criação'),
            Column::computed('action')->title('Acões')
               ->exportable(false)
               ->printable(false),
        ];
    }


    protected function filename()
    {
        return 'Professor_' . date('YmdHis');
    }
}
