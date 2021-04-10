<?php

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Permission;

/*
    this function to check if the url have special word or not
        url => ar/dashboard/users
        in_url('users') => the reslt will be [ true ]
*/
function in_url($link)
{
    $url = explode('/', request()->route()->uri);
    if ($link == 'dashboard')
        return last($url) == 'dashboard' ? 'true' : '';

    return in_array($link, $url) ? true : false;
} // END

/*
    this function to return the model name from url
        url => ar/dashboard/users
        table_name() => the reslt will be [ users ]
*/
function table_name()
{
    $url = explode('/', request()->route()->uri);
    if (strlen($url[0]) < 3)
        array_shift($url);

    return $url[1];
} // END

/*
    this function to return the singular model name form table_name function
*/
function model_name()
{
    return Str::singular(table_name());
} // END

/*
    this function return all permissions
*/
function get_permissions()
{
    $permissions = [];
    foreach (Permission::select('name')->get() as $permission)
        $permissions[ last(explode('-', $permission['name'])) ] [] = $permission['name'];

    return $permissions;
} // END

// function to save the image in image folder
function uploadImage($image, $folder)
{
    image::make($image)
        ->resize(150, null, function ($constraint) {
            $constraint->aspectRatio();
        })
        ->save(public_path('uploads/images/' . $folder . '/' . $image->hashName()), 60);
    return $image->hashName();
} // end of image function

// function to remove the image
function removeImage($oldImage, $folder)
{
    if ($oldImage == 'default.jpg')
        return true;

    $path = public_path('uploads/images/' . $folder . '/' . $oldImage);
    if (File::exists($path))
        unlink($path);
} // end of removed image function
