<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DirectToRightPageController extends Controller
{

    public function direct($request)
    {
        $call_wildcard = new Wildcard();
        $result = $call_wildcard->getHash();
        return view('give')->with(['page_content_determiner' => $request, 'array_from_wildcard' => $result]);
    }

}
