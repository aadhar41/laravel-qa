<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class VoteAnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Answer $answer)
    {
        $vote = (int) request()->vote;
        // Auth::user()->voteAnswer($answer, $vote);
        auth()->user()->voteAnswer($answer, $vote);
        return back();
    }
}
