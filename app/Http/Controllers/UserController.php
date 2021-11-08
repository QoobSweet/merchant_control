<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        return view('modules/user/pages/index', ['board' => $request->user()->boards[0]]);
    }
}
