<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;

class BoardsController extends Controller
{
    public function show(Request $request)
    {
        return view('modules/user/pages/boards', ['board' => $request->user()->boards[0]]);
    }
}
