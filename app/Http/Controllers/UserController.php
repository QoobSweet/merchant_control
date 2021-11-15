<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('modules/user/pages/index', ['board' => Board::with('user', 'sections')->get()[0]]);
    }
}
