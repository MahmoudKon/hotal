<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\EmployeesDataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Models\Permission;
use Illuminate\Http\Request;

class EmployeesController extends DashboardController
{
    public function __construct(Employee $model, EmployeesDataTable $dataTable)
    {
        parent::__construct($model, $dataTable);
    } // End of Construct Method

    public function store (EmployeeRequest $request)
    {
        try {
            if (Employee::create($request->except(['id', 'password_confirmation']))) {
                toastr()->success('Employee Created Successfully', 'Create');
                return redirect()->route('dashboard.employees.index');
            }
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of store method [ store the new record data ]

    public function update (EmployeeRequest $request, Employee $employee)
    {
        try {
            if(isset($request->image) && $employee->image != 'default.jpg')
                unlink(public_path('uploads/images/employees/' . $employee->image));

            $employee->update($request->except(['id', 'password_confirmation']));
            toastr()->success('Employee Updated Successfully', 'Update');
            return redirect()->route('dashboard.employees.index');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of update method [ save the new data ]

    public function banned(Employee $employee)
    {
        try {
            $employee->update(['banned' => !$employee->banned]);
            if ($employee->banned)
                return response()->json(['message' => 'Banned Successfuly', 'title' => 'Banned']);
            else
                return response()->json(['message' => 'Unbanned Successfuly', 'title' => 'Unbanned']);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of bannedspdate method [ Banned data ]

    public function permissions (Request $request)
    {
        try {
            $permissions = Permission::select('name')->whereHas('roles', function ($q) use ($request) {
                return $q->where('name', $request->role);
            })->get()->toArray();

            $role_permissions = [];
            foreach ($permissions as $index => $permission)
                $role_permissions [] = $permission['name'];

            return response(view('dashboard.employees.permissions', compact('role_permissions')));
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'title' => 'Exception'], 404);
        }
    } // end of permissions method [ to return all permissions that have special role ]
}
