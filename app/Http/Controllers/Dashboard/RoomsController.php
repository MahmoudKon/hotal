<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\RoomsDataTable;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\RoomRequest;
use App\Models\Floor;
use App\Models\Room;

class RoomsController extends DashboardController
{
    public function __construct(Room $model, RoomsDataTable $dataTable)
    {
        parent::__construct($model, $dataTable);
    } // End of Construct Method

    protected function append()
    {
        return [
            'floors' => Floor::where('is_available', 1)->get(),
        ];
    }

    public function store(RoomRequest $request)
    {
        try {
            if (Room::create($request->except(['id', 'image']))) {
                toastr()->success('Room Created Successfully', 'Create');
                return redirect()->route('dashboard.rooms.index');
            }
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of store method [ store the new record data ]

    public function update(RoomRequest $request, Room $room)
    {
        try {
            $room->update($request->except(['id', 'image']));
            toastr()->success('Room Updated Successfully', 'Update');
            return redirect()->route('dashboard.rooms.index');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage(), 'Exception');
            return redirect()->back();
            // return response()->json($e->getMessage(), 404);
        }
    } // end of update method [ save the new data ]

    public function is_available(Room $room)
    {
        try {
            $room->update(['is_available' => !$room->is_available]);
            if ($room->is_available)
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
