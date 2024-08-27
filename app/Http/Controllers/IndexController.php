<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class IndexController extends Controller
{
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    /* * * * * * * * * * * * * * * *\
    |*             GET             *|
    \* * * * * * * * * * * * * * * */

    /**
     * Display the index view.
     * @return View The view.
     */
    public function index(): View
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
