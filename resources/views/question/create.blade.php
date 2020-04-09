@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Question</div>
                    <div class="card-body">

                        <form action="/questionnaires/{{ $questionnaire->id }}/questions" method="post">

                            <div class="form-group">

                                <label for="question">Title</label>
                                <input name="question[question]" type="text" class="form-control" id="question" aria-describedby="questionHelp" placeholder="Enter Question">
                                <small id="questionHelp" class="form-text text-muted">Ask a simple question</small>

                                @error('question.question')
                                    <small class="text text-danger">{{ $message }}</small>
                                @enderror

                            </div>
                            <div class="form-group">
                                <fieldset>
                                    <legends>Choices</legends>
                                    <small id="choicesHelp" class="form-text text-muted">Give choices that give the most insight</small>
                                    <div>
                                        <div class="form-group">

                                            <label for="answer1">Choice 1</label>
                                            <input name="answers[][answer]" type="text"
                                            class="form-control" id="answer1" aria-describedby="choice1Help" placeholder="Enter Choice 1">

                                            @error('answers.0.answer')
                                                <small class="text text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>

                                   <div>
                                        <div class="form-group">

                                            <label for="answer2">Choice 2</label>
                                            <input name="answers[][answer]" type="text"
                                            class="form-control" id="answer2" aria-describedby="choice2Help" placeholder="Enter Choice 2">

                                            @error('answers.1.answer')
                                                <small class="text text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>

                                   <div>
                                        <div class="form-group">

                                            <label for="answer3">Choice 3</label>
                                            <input name="answers[][answer]" type="text"
                                            class="form-control" id="answer3" aria-describedby="choice3Help" placeholder="Enter Choice 3">

                                            @error('answers.2.answer')
                                                <small class="text text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>

                                   <div>
                                        <div class="form-group">

                                            <label for="answer4">Choice 4</label>
                                            <input name="answers[][answer]" type="text"
                                            class="form-control" id="answer4" aria-describedby="choice4Help" placeholder="Enter Choice 4">

                                            @error('answers.3.answer')
                                                <small class="text text-danger">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <button type="submit" class="btn btn-primary">Create Questionnaire </button>
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
