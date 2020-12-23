@extends('layouts.template')


@section('content')
    <div class="card">
        <div class="card-body">
            <h3>Название теста: {{ $test->name }}</h3>
            <h3>Дата создания теста: {{ $test->created_at }}</h3>
            @foreach($question_id as $question)
                <h4>Название вопроса : {{ $question->question}}</h4>
                @foreach($answer_id as $answer)
                    <h5>Вариант ответа : {{$answer->answer}}</h5>
                @endforeach
            @endforeach
        </div>
    </div>
@endsection
