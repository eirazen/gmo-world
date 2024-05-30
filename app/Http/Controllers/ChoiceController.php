<?php

namespace App\Http\Controllers;

use App\Models\Choice;
use Illuminate\Http\Request;

class ChoiceController extends Controller
{
    //
    public function getChoices($question_id)
    {

        $choices = Choice::where('question_id', $question_id)->get();

        return response()->json([
            'choices' => $choices
        ]);
    }
}
