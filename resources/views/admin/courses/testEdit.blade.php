<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('admin.courses-testUpdate', $test) }}">
                @csrf
                @method('PATCH')
                <form method="post" enctype="multipart/form-data" action="">
                    <div class="form-group">
                        <label for="test-name">Название теста</label>
                        <input type="text" name="name" value="{{ $test->name }}" class="form-control" id="name">
                    </div>
                @endif
                <form method="POST" action="{{ route('courses-testUpdate', $test) }}">
                    @csrf
                    @method('PATCH')
                        <form method="post" enctype="multipart/form-data" action="">
                            <div class="form-group">
                                <label for="test-name">Название теста</label>
                                <input type="text" name="name" value="{{ $test->name }}" class="form-control" id="name">
                            </div>
                            @foreach($test->questions as $question)
                                <h4>Название вопроса : <input type="text" name="questions-{{$question->getKey()}}" value="{{ $question->question}}" class="form-control" id="question"></h4>
                                @foreach($question->answers as $answer)
                                    <h5>Вариант ответа  :  <input type="text" name="answers-{{$answer->getKey()}}" value="{{ $answer->answer }}" class="form-control" id="answer">

                                        @if ( $answer->is_correct == 1 )
                                            <input type="checkbox" name="is_correct-{{$answer->getKey()}}"  class="form-check-input" checked> Правильный ответ
                                        @else <input type="checkbox" name="is_correct-{{$answer->getKey()}}"  class="form-check-input">
                                        @endif
                                    </h5>
                                @endforeach
                            @endforeach

