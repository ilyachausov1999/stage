<div class="container">
    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('custom-result', $test) }}">
                @csrf
                @method('POST')
                <form method="post" enctype="multipart/form-data" action="">
                    <h3>Название теста: {{ $test->name }}</h3>
                    @foreach($test->questions as $question)
                        <h4 >Вопрос : {{$question->question}}</h4>
                            {{-- <h4>Вопрос : <input type="text" name="questions-{{$question->getKey()}}" value="" class="form-control" id="question">{{$question->question}}</h4>--}}
                        @foreach($question->answers as $answer)
                            <h5>Вариант ответа  : {{ $answer->answer }}
{{--                            <h5>Вариант ответа  :  <input type="text" name="answers-{{$answer->getKey()}}" value="{{ $answer->answer }}" class="form-control" id="answer">--}}
                                <input class="form-check-input" type="radio" name="is_correct-{{$answer->getKey()}}" id="exampleRadios1" >
{{--                                @if ( $answer->is_correct == 1 )--}}
{{--                                    <input type="checkbox" name="is_correct-{{$answer->getKey()}}"  class="form-check-input" checked> Правильный ответ--}}
{{--                                @else <input type="checkbox" name="is_correct-{{$answer->getKey()}}"  class="form-check-input">--}}
{{--                                @endif--}}
                            </h5>
                        @endforeach
                    @endforeach
                    <button type="submit" class="btn btn-sm btn-success">Отредактировать</button>
                </form>
            </form>


{{--            <h3>Название теста: {{ $test->name }}</h3>--}}
{{--            <h3>Дата создания теста: {{ $test->created_at }}</h3>--}}
{{--            @foreach($test->questions as $question)--}}
{{--                <h4>Вопрос : {{ $question->question}}</h4>--}}
{{--                <a><img src="{{ route('file.get',$question->image) }}" class="rounded" width='50' height='50'></a>--}}
{{--                @foreach($question->answers as $answer)--}}
{{--                    <h5>Вариант ответа : {{$answer->answer}}--}}
{{--                        <div class="form-check">--}}
{{--                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>--}}
{{--                            <label class="form-check-label" for="exampleRadios1">Верные ответ</label>--}}
{{--                        </div>--}}
{{--                        @if ( $answer->is_correct == 1 )--}}
{{--                            - Правильный ответ--}}
{{--                        @endif--}}
{{--                    </h5>--}}
{{--                @endforeach--}}
{{--            @endforeach--}}
        </div>
    </div>
</div>
