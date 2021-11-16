<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $boards = Board::with(['sections', 'sections.leads'])->where('user_id', Auth::user()->id)->get();
        $board = $boards->firstOrFail();

        return view('modules/user/pages/index', [
            'boards' => $boards,
            'board' => $board,
        ]);
    }
}
