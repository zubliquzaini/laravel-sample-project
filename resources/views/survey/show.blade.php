@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <form action="/surveys/{{ $questionnaire->id }}-{{Str::slug($questionnaire->title)}}" method="post">
                @foreach ($questionnaire->questions as $key=> $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{ $key+1 }}</strong>  {{ $question->question }}</div>
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <label for="answer{{ $answer->id }}">
                                        <li class="list-group-item">
                                            <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}"
                                            {{ (old('responses.'. $key .'.answer_id') == $answer->id) ? 'checked' : ''}}
                                            class="mr-2" value="{{ $answer->id }}">
                                            {{ $answer->answer }}

                                            <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                        </li>
                                    </label>
                                @endforeach
                            </ul>

                            @error('responses.'. $key .'.answer_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                @endforeach
                @csrf

                <div class="card mt-4">
                    <div class="card-header">Your Information</div>
                    <div class="card-body">
                        <div class="form-group">
                        <label for="name">Name</label>
                            <input name="survey[name]" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                        <label for="email">Email</label>
                            <input name="survey[email]" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-dark">Complete Survey</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
