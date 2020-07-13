<?php

namespace App\Http\Controllers;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //method pembantu

        $name = request('name');
        return view('home', compact('name'));
    }
}
