<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    protected $model, $dataTable;

    public function __construct(Model $model, $dataTable)
    {
        $this->model       = $model;
        $this->dataTable   = $dataTable;
    } // set the model and datatables

    public function index()
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

    public function create()
    {
        try {
            return response()->json(view('dashboard.' . $this->pluralClassName() . '.create')->with($this->append())->render());
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 404);
        }
    } // end of created method [ create new record ]

    public function edit($id)
    {
        try {
            $row = $this->model::findOrFail($id);
            return response()->json(view('dashboard.' . $this->pluralClassName() . '.edit', compact('row'))->with($this->append())->render());
        } catch (\Exception $e) {
            // toastr()->error($e->getMessage(), 'Exception');
            // return redirect()->back();
            return response()->json($e->getMessage(), 404);
        }
    } // end of edit method [ edit record data ]

    public function show($id)
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

    public function destroy($id)
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

    protected function append()
    {
        return [];
    } // to return array

    protected function pluralClassName()
    {
        return Str::plural(strtolower(class_basename($this->model)));
    } // to the plural class name
}
