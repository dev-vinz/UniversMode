<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * *\
    |*             GET             *|
    \* * * * * * * * * * * * * * * */

    public function index()
    {
        return view('index');
    }

    /* * * * * * * * * * * * * * * *\
    |*             POST            *|
    \* * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * *\
    |*             PUT             *|
    \* * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * *\
    |*            DELETE           *|
    \* * * * * * * * * * * * * * * */
}
