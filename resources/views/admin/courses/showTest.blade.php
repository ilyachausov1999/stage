@extends('layouts.template')


@section('content')
    <div class = " col-md-2  "  style = "background: white; border-radius: 10px; border: 4px double black;">
        <ul class="nav col-md-10">
            <li><a href="{{ route('users.index') }}">Просмотр пользователей</a></li>
            <li><a href="{{ route('users.create') }}">Добавить пользователя</a></li>
            <li><a href="{{ route('courses-all') }}">Просмотр  курсов</a></li>
            <li><a href="{{ route('courses-create') }}">Добавить курс</a></li>
        </ul>
    </div>
    <div class="container">
    <div class="card">
        <div class="card-body">
            <h3>Название теста: {{ $test->name }}</h3>
            <h3>Дата создания теста: {{ $test->created_at }}</h3>
            @foreach($test->questions as $question)
                <h4>Название вопроса : {{ $question->question}}</h4>
            <a><img src="{{ route('file.get',$question->image) }}" class="rounded" width='50' height='50'></a>
                @foreach($answer_id as $answer)
                    <h5>Вариант ответа : {{$answer->answer}}</h5>
                        @if ( $answer->is_correct == 1 )
                             - Правильный ответ
                            @endif
                @endforeach
        </div>
    </div>
    </div>

@endsection
