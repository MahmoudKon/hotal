<?php

namespace App\DataTables;

use App\Models\Floor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class FloorsDataTable extends DataTable
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
            ->addColumn('is_available', 'dashboard.floors.available_button')
            ->addColumn('action', 'dashboard.includes.buttons.buttons_table')
            ->rawColumns(['action', 'is_available']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Floor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Floor $model)
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
            ->setTableId('floors-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Blfrtip')
            ->lengthMenu([5, 10, 25, 50, 100])
            ->orderBy(0)
            ->buttons(
                Button::make('csv')->text(__('app.csv')),
                Button::make('excel')->text(__('app.excel')),
                Button::make('copy')->text(__('app.copy')),
                Button::make('pdf')->text(__('app.pdf')),
                Button::make('print')->text(__('app.print')),
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
            Column::make('number')->title(__('floors.number')),
            Column::make('is_available')->title(__('floors.is_available'))->width(60)->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center')
                ->title(__('app.action')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Floors_' . date('YmdHis');
    }
}
