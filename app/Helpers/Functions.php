<?php

/*
    this function to check if the url have special word or not
        url => ar/dashboard/users
        in_url('users') => the reslt will be [ true ]
*/
function in_url($link)
{
    $url = explode('/', request()->route()->uri);
    return in_array($link, $url) ? true : false;
} // END

/*
    this function to return the mofel name from url
        url => ar/dashboard/users
        model_name() => the reslt will be [ users ]
*/
function model_name()
{
    $url = explode('/', request()->route()->uri);
    if (strlen($url[0]) == 2)
        array_shift($url);

    return $url[1];
} // END
