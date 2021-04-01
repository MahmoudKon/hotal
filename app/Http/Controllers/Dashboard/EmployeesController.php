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
        try {
            if (request()->ajax())
                return $dataTable->render('dashboard.includes.tables.datatable');

            $count = Employee::whereRoleIs(['admin', 'manager', 'employee'])->count();
            return view('dashboard.includes.pages.index', compact('count'));
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // end of index method [ show all records ]

    public function create ()
    {
        try {
            return view('dashboard.includes.pages.create');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of created method [ create new record ]

    public function store (Request $request)
    {
        try {
            dd($request->all());
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of store method [ store the new record data ]

    public function edit (Employee $employee)
    {
        try {
            return view('dashboard.includes.pages.edit', ['row' => $employee]);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of edit method [ edit record data ]

    public function update (Request $request, Employee $employee)
    {
        try {
            dd($employee);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of update method [ save the new data ]

    public function show (Employee $employee)
    {
        try {
            dd('show');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of show method [ show the record data ]

    public function destroy (Employee $employee)
    {
        try {
            if ($employee->delete()) {
                return response()->json(['message' => 'Deleted Successfuly', 'title' => 'Deleted']);
            }
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of destroy method [ destroy the record data ]
}
