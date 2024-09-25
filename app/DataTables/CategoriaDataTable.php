<?php

namespace App\DataTables;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CategoriaDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $edit = "<a href='".route('categoria.edit', $query->id)."' class='btn btn-primary mb-2'><i class='far fa-edit'></i></a>";
                $delete = "<a href='".route('categoria.destroy', $query->id)."' class='btn btn-danger delete-item'><i class='far fa-trash-alt'></i></a>";
                                                                                            //class delete-item responsavél para abrir o modal
                return $edit.$delete;
            })
            ->addColumn('status', function($query){
                if($query->status == 1){
                    $botao = '<label class="custom-switch mt-2">
                        <input type="checkbox" checked name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input atualiza-status">
                        <span class="custom-switch-indicator"></span>
                        </label>';
                }else{
                    $botao = '<label class="custom-switch mt-2">
                        <input type="checkbox"  name="custom-switch-checkbox" data-id="'.$query->id.'" class="custom-switch-input atualiza-status">
                        <span class="custom-switch-indicator"></span>
                        </label>';
                }
                return $botao;
            })
            ->addColumn('icon', function($query){
                $icon = "<i class='".$query->icon."' style='font-size:25px;'></i>";
                return $icon;
            })
            ->rawColumns(['icon', 'action', 'name', 'status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Categoria $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    //->setTableId('categoria-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->language([
                        'url' => asset('backend/assets/js/datatable/pt-BR.json'),
                    ])
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            Column::make('id')->title('Código'),
            Column::make('icon')->title('Icone'),
            Column::make('name')->title('Nome'),
            Column::make('slug')->title('Descrição'),
            Column::make('status')->addClass('text-center')->title('Situação'),
            Column::computed('action')->title('Acões')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Categoria_' . date('YmdHis');
    }
}
