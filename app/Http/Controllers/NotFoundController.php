<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotFoundController extends Controller
{
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    public function __invoke()
    {
        return response()->view('errors.404', status: 404);
    }
}
