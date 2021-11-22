<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardsController extends Controller
{
//    public function show(Request $request)
//    {
//        return view('modules/user/pages/boards', ['boards' => $request->user()->boards]);
//    }

    // temporarily we are only using 1 board per person
    public function settings(Request  $request)
    {
        return view('modules/user/pages/board-settings', [
            'board' => Auth::user()->getFirstBoardOrCreate(),
        ]);
    }
}
