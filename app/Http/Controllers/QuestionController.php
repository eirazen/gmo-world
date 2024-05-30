<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function getQuestions($level = null)
    {
        $questions = Question::with('choices')->where('level', $level)->get();

        return response()->json(['questions' => $questions]);
    }
}
