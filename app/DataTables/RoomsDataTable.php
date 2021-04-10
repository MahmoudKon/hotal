<?php

namespace App\DataTables;

use App\Models\Room;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RoomsDataTable extends DataTable
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
            ->editColumn('info', function ($room) {
                return strlen($room->info) > 40 ? substr($room->info, 0, 40) . ' ...' : $room->info;
            })
            ->addColumn('is_available', 'dashboard.rooms.available_button')
            ->addColumn('images', 'dashboard.rooms.images')
            ->addColumn('action', 'dashboard.includes.buttons.buttons_table')
            ->rawColumns(['info', 'images', 'action', 'is_available']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param App\Models\Room $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Room $model)
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
            ->setTableId('rooms-table')
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
            Column::make('number')->title(__('rooms.number')),
            Column::computed('info')->title(__('rooms.info'))->width(200),
            Column::computed('images')->title(__('rooms.images')),
            Column::make('people_count')->title(__('rooms.people_count')),
            Column::make('price')->title(__('rooms.price')),
            Column::make('is_available')->title(__('rooms.is_available'))->width(40)->addClass('text-center'),
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
        return 'Rooms_' . date('YmdHis');
    }
}
