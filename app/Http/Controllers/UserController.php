<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;

        $boards = Board::where('user_id', Auth::user()->id)->get();
        $board = $boards->first();
        if (!$board) {
            $board = Auth::user()->boards()->create([
                'title' => 'New Board',
                'description' => '',
                'is_personal' => false,
                'user_id' => $user_id,
                'team_id' => null
            ]);
        }

        return view('modules/user/pages/index', [
            'boards' => $boards,
            'board' => $board,
        ]);
    }
}
