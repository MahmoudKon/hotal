<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UsersController extends DashboardController
{
    public function __construct(User $model, UsersDataTable $dataTable)
    {
        parent::__construct($model, $dataTable);
    } // End of Construct Method

    public function store(UserRequest $request)
    {
        try {
            if (User::create($request->except(['id', 'password_confirmation'])))
                return response()->json(['message' => 'User Created Successfully', 'title' => 'Create']);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of store method [ store the new record data ]

    public function update(UserRequest $request, User $user)
    {
        try {
            if ($user->update($request->except(['id', 'password_confirmation'])))
                return response()->json(['message' => 'User Updated Successfully', 'title' => 'Updated']);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of store method [ store the new record data ]

    public function banned(User $user)
    {
        try {
            $user->update(['banned' => !$user->banned]);
            if ($user->banned)
                return response()->json(['message' => 'Banned Successfuly', 'title' => 'Banned']);
            else
                return response()->json(['message' => 'Unbanned Successfuly', 'title' => 'Unbanned']);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of bannedspdate method [ Banned data ]
}
