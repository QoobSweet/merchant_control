<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function show(Request $request)
    {
        return view('board', ['board' => $request->user()->boards[0]]);
    }
}
