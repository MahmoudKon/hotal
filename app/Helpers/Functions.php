<?php
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
    if (strlen($url[0]) == 2)
        array_shift($url);

    return $url[1];
} // END

/*
    this function to return the singular model name form table_name function
*/
function model_name()
{
    return Illuminate\Support\Str::singular(table_name());
} // END
