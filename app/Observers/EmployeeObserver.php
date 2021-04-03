<?php

namespace App\Observers;

use App\Models\Employee;
use App\Models\Role;
use Keygen\Keygen;

class EmployeeObserver
{
    public function created(Employee $employee)
    {
        $employee->update([
            'emp_id'     => Keygen::numeric(8)->generate(),
            'created_by' => auth()->user()->id ?? 1,
        ]);
    } //  Call The Image Method IN Down When Create New Employee And Create Generate Unique Code

    public function updated(Employee $employee)
    {
        $this->image($employee);
        $this->setPermissions($employee);
    } //  Call The Image Method IN Down When Update The Employee

    public function deleted(Employee $employee)
    {
        removeImage($employee->image, 'employees');
    } // Remove The Image From Folder When Delete The Employee

    protected function image($employee)
    {
        if (substr(realpath($employee->image), 0, 4) == '/tmp') {
            $employee->image = uploadImage($employee->image, 'employees');
            $employee->save();
        }
    } // To Check If The Employee Has IN Database New Image Upload to To Folder

    protected function setPermissions($employee)
    {
        $permissions = Role::select('id')->where('name', $employee->role)->first()->permissions;
        $employee->syncRoles([$employee->role]);
        $employee->syncPermissions($permissions);
    } // Set The Permissions From Role Name
}
