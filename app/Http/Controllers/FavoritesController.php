<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function __invoke()
    // {
    //     dd('Invoked');
    // }

    public function store(Question $question, Request $request)
    {
        $question->favorites()->attach(auth()->id());
        if ($request->expectsJson()) {
            return response()->json(null, 204);
        }
    }

    public function destroy(Question $question, Request $request)
    {
        $question->favorites()->detach(auth()->id());
        if ($request->expectsJson()) {
            return response()->json(null, 204);
        }
    }
}
