<?php

namespace App\DataTables;

use App\Models\Employee;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class EmployeesDataTable extends DataTable
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
            ->addColumn('image', 'dashboard.includes.tables.image')
            ->addColumn('role', function ($employee) {
                return '<div class="badge badge-'.($employee->role=='admin'?"success":($employee->role=='manager'?"info":'primary')).'">' . $employee->role . '</div>';
            })
            ->setRowClass('{{ $banned ? "warning" : "" }}')
            // ->setRowAttr(['align' => 'center'])
            // ->addColumn('role', function (Employee $employee) {
            //     return '<div class="badge badge-' . ((in_array($employee->roles->first()->name, ['manager', 'admin']) ? 'success' : 'info')) . '">' . $employee->roles->first()->name . '</div>';
            // })
            ->addColumn('action', 'dashboard.includes.buttons.buttons_table')
            ->rawColumns(['image', 'action', 'role']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Employee $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Employee $model)
    {
        return $model->newQuery()->withOutSuperAdmin();
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
            Column::make('role')->title( __('employees.role')),
            Column::make('username')->title( __('employees.username')),
            Column::make('image')->title( __('employees.image')),
            Column::make('email')->title( __('employees.email')),
            Column::make('phone')->title( __('employees.phone')),
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
        return 'Employees_' . date('YmdHis');
    }
}
