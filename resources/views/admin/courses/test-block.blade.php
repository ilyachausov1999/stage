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
    <div >
             <h3>Создать тест</h3>
    <div  class = "col-xs-12 col-md-2 rounded "  style = " border-radius: 10px; border: 4px double black;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card" style="width: 100%;">

        </div>

    </div>

    <div>
             <h3>Добавить блок-тест</h3>
        <div  style="width: 100%">
            <form method="POST" enctype="multipart/form-data" id="form" action="{{ route('courses-testStore', $id) }}">
                @csrf

                <div class="form-group">
                    <label for="content-title">Название теста</label>
                    <input type="text" name="name" value="" class="form-control " id="content-title">
                </div>

                <div class="form-group">
                    <label for="content-title">Вопрос</label>
                    <input type="text" name="questions[0][name]" value="" class="form-control " id="content-title">
                </div>
                <div class="form-group">
                    <label>Изображение</label>
                    <input type="file" name="image" class="form-control">
                    <h5>* максимальный размер изображения 1мб</h5>
                </div>
                <div class="form-group">
                    <label for="content-title">Ответ</label>
                    <input type="text" name="questions[0][answers][0][answer]" value="" class="form-control " id="content-title">
                    <input type="checkbox" class="form-check-input" name="questions[0][answers][0][is_correct]" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Верный ответ</label>
                </div>
                <div class="form-group">
                    <label for="content-title">Ответ</label>
                    <input type="text" name="questions[0][answers][1][answer]" value="" class="form-control " id="content-title">
                    <input type="checkbox" class="form-check-input" name="questions[0][answers][1][is_correct]" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Верный ответ</label>
                </div>
                <div class="form-group">
                    <label for="content-title">Ответ</label>
                    <input type="text" name="questions[0][answers][2][answer]" value="" class="form-control " id="content-title">
                    <input type="checkbox" class="form-check-input" name="questions[0][answers][2][is_correct]" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Верный ответ</label>
                </div>

                <button class="btn btn-success" type="button" onclick="add_question()">Добавить вопрос</button>
                <button class="btn btn-success" type="button" onclick="add_answer()">Добавить ответ</button>
                <button class="btn btn-success" type="submit">Сохранить</button>
            </form>
        </div>
    </div>
            <script>
                let n = 0;
                function add_question(){
                    n = n + 1;
                    var name = "Вопрос" + n;
                    var y = document.getElementById("form");
                    var new_label = document.createElement("label");
                    new_label.setAttribute("for", "content-title");
                    new_label.setAttribute("id", "label_qv" + n);
                    var pos1 = y.childElementCount;
                    y.insertBefore(new_label, y.childNodes[pos1]);
                    var label_qv = document.getElementById("label_qv" + n);
                    label_qv.insertAdjacentHTML('afterbegin' , name);

                    var new_field = document.createElement("input");
                    new_field.setAttribute("type", "text");
                    new_field.setAttribute("name", "questions[" + n + "][name]");
                    new_field.setAttribute("class", "form-control");
                    var pos = y.childElementCount;
                    y.insertBefore(new_field, y.childNodes[pos]);


                    var z = 0;
                    z = z + 1;
                    if(z > 0){x = 0}
                }

                let m = 0;
                let x = 0;
                function add_answer(){
                    m = m + 1
                    x = x + 1;
                    let name = "Ответ" + x;
                    var y = document.getElementById("form");
                    var new_label = document.createElement("label");
                    new_label.setAttribute("for", "content-title");
                    new_label.setAttribute("id", "label_an" + m);
                    var pos0 = y.childElementCount;
                    y.insertBefore(new_label, y.childNodes[pos0]);
                    var label_an = document.getElementById("label_an" + m);
                    label_an.insertAdjacentHTML('afterbegin' , name);

                    var new_field_check = document.createElement("input");
                    new_field_check.setAttribute("type", "checkbox");
                    new_field_check.setAttribute("name", "questions[" + n + "][answers][" + m + "][is_correct]");
                    new_field_check.setAttribute("class", "form-check-input");
                    var pos1 = y.childElementCount;
                    y.insertBefore(new_field_check, y.childNodes[pos1]);

                    var new_field = document.createElement("input");
                    new_field.setAttribute("type", "text");
                    new_field.setAttribute("name", "questions[" + n + "][answers][" + m + "][answer]");
                    new_field.setAttribute("class", "form-control");
                    var pos = y.childElementCount;
                    y.insertBefore(new_field, y.childNodes[pos]);
                }

            </script>

</div>
@endsection
