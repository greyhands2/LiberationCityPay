<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DirectToRightPageController extends Controller
{

    public function direct($request)
    {
          return view('give')->with(['page_content_determiner' => $request]);
    }

}
