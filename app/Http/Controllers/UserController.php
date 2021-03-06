<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(Request $request)
    {
        return view('modules/user/pages/index', [
            'board' => Auth::user()->getFirstBoardOrCreate()
        ]);
    }
}
