<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\FloorsDataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\FloorRequest;
use App\Models\Floor;

class FloorsController extends DashboardController
{
    public $dataTable;
    public function __construct(Floor $model, FloorsDataTable $dataTable)
    {
        parent::__construct($model, $dataTable);
    } // End of Construct Method

    public function index()
    {
        try {
            if (request()->ajax())
                return $this->dataTable->render('dashboard.includes.tables.datatable');

            $count = $this->model::count();
            return view('dashboard.floors.index', compact('count'));
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // end of index method [ show all records ]

    public function store(FloorRequest $request)
    {
        try {
            if (Floor::create($request->except(['id']))) {
                return response()->json(['message' => 'Floor Created Successfully', 'title' => 'Create']);
            }
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // end of store method [ store the new record data ]

    public function update(FloorRequest $request, Floor $floor)
    {
        try {
            $floor->update($request->except(['id', 'image']));
            return response()->json(['message' => 'Floor Updated Successfully', 'title' => 'Updated']);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of update method [ save the new data ]

    public function is_available(Floor $floor)
    {
        try {
            $floor->update(['is_available' => !$floor->is_available]);
            if ($floor->is_available)
                return response()->json(['message' => 'Available Successfuly', 'title' => 'Available']);
            else
                return response()->json(['message' => 'Not Available Successfuly', 'title' => 'Not Available']);
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of is_available method [ is_available data ]
}
