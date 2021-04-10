<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\RoomsDataTable;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\DashboardController;
use App\Http\Requests\RoomRequest;
use App\Models\Floor;
use App\Models\Room;
use App\Models\RoomImage;

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
            if ($room = Room::create($request->except(['id', 'image']))) {
                if ($request->image) {
                    foreach ($request->image as $image) {
                        image::make($image)
                            ->resize(150, null, function ($constraint) {
                                $constraint->aspectRatio();
                            })
                            ->save(public_path('uploads/images/rooms/' . $image->hashName()), 60);
                        RoomImage::create([
                            'image' => $image->hashName(),
                            'room_id' => $room->id,
                        ]);
                    }
                }
                return response()->json(['message' => 'Room Created Successfully', 'title' => 'Create']);
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
            if ($request->image) {
                foreach ($request->image as $image) {
                    image::make($image)
                        ->resize(150, null, function ($constraint) {
                            $constraint->aspectRatio();
                        })
                        ->save(public_path('uploads/images/rooms/' . $image->hashName()), 60);
                    RoomImage::create([
                        'image' => $image->hashName(),
                        'room_id' => $room->id,
                    ]);
                }
            }
            return response()->json(['message' => 'Room Updated Successfully', 'title' => 'Update']);
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
