<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->setRowClass('{{ $banned ? "warning" : "" }}')
            ->addColumn('action', 'dashboard.includes.buttons.buttons_table');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('employees-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Blfrtip')
            ->lengthMenu([5, 10, 25, 50, 100])
            ->orderBy(0)
            ->buttons(
                Button::make('csv')->text( __('app.csv') ),
                Button::make('excel')->text( __('app.excel') ),
                Button::make('copy')->text( __('app.copy') ),
                Button::make('pdf')->text( __('app.pdf') ),
                Button::make('print')->text( __('app.print') ),
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('username')->title( __('users.username')),
            Column::make('email')->title( __('users.email')),
            Column::make('phone')->title( __('users.phone')),
            Column::make('created_at')->title( __('app.created_at')),
            Column::computed('action')
                    ->exportable(false)
                    ->printable(false)
                    ->width(50)
                    ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
