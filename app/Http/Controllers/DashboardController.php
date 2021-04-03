<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class DashboardController extends Controller
{
    protected $model, $dataTable;

    public function __construct(Model $model, $dataTable)
    {
        $this->model       = $model;
        $this->dataTable   = $dataTable;
    } // set the model and datatables

    public function index ()
    {
        try {
            if (request()->ajax())
                return $this->dataTable->render('dashboard.includes.tables.datatable');

            $count = $this->model::count();
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

    public function edit ($id)
    {
        try {
            $row = $this->model::findOrFail($id);
            return view('dashboard.includes.pages.edit', compact('row'));
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of edit method [ edit record data ]

    public function show ($id)
    {
        try {
            $row = $this->model::findOrFail($id);
            return $row;
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of show method [ show the record data ]

    public function destroy ($id)
    {
        try {
            $row = $this->model->findOrFail($id);
            if ($row->delete()) {
                return response()->json(['message' => 'Deleted Successfuly', 'title' => 'Deleted']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'title' => 'Exception'], 404);
            // return response()->json($e->getMessage(), 404);
        }
    } // end of destroy method [ destroy the record data ]
}
