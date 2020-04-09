<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Questionnaire;
class SurveyController extends Controller
{
    public function show(Questionnaire $questionnaire) {

        $questionnaire->load('questions.answers');

        return view('survey.show', compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire) {

        $data = request()->validate([
            'responses.*.question_id' => 'required',
            'responses.*.answer_id' => 'required',
            'survey.name' => 'required',
            'survey.email' => 'required|email'
        ]);

        $survey = $questionnaire->surveys()->create($data['survey']);
        $survey->responses()->createMany($data['responses']);


        return 'Thank you!';
    }
}
