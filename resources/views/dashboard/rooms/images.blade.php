@foreach (App\Models\RoomImage::where('room_id', $id)->get() as $image)
<li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="{{ $number }}"
    class="avatar avatar-sm pull-up">
    <img src="{{ $image->image_path }}" class="media-object rounded-circle mb-1" width="50px">
</li>
@endforeach
