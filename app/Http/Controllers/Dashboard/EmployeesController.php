<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\EmployeesDataTable;
use App\Http\Controllers\DashboardController;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeesController extends DashboardController
{
    public function index (EmployeesDataTable $dataTable)
    {
        $count = Employee::whereRoleIs(['admin', 'manager', 'employee'])->count();
        return $dataTable->render('dashboard.employees.index', compact('count'));
    }
}
