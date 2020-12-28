<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>Название теста: {{ $test->name }}</h3>
            <h3>Дата создания теста: {{ $test->created_at }}</h3>
            @foreach($test->questions as $question)
                <h4>Название вопроса : {{ $question->question}}</h4>
            <a><img src="{{ route('file.get',$question->image) }}" class="rounded" width='50' height='50'></a>
                @foreach($question->answers as $answer)
                    <h5>Вариант ответа : {{$answer->answer}}
                        @if ( $answer->is_correct == 1 )
                             - Правильный ответ
                        @endif
                    </h5>
                @endforeach
            @endforeach
        </div>
    </div>
</div>

