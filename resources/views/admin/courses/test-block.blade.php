@extends('layouts.template')
@section('template')
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
            <form method="POST" enctype="multipart/form-data" action="{{ route('courses-testStore', $id) }}">
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
                    <label for="content-title">Ответ</label>
                    <input type="text" name="questions[0][answers][0][answer]" value="" class="form-control " id="content-title">
                    <input type="checkbox" class="form-check-input" name="questions[0][answers][0][is_correct]" id="exampleCheck1" >
                    <label class="form-check-label" for="exampleCheck1">Верный ответ</label>
                </div>
                <div class="form-group">
                    <label for="content-title">Ответ</label>
                    <input type="text" name="questions[0][answers][1][answer]" value="" class="form-control " id="content-title">
                    <input type="checkbox" class="form-check-input" name="questions[0][answers][1][is_correct]" id="exampleCheck1"  >
                    <label class="form-check-label" for="exampleCheck1">Верный ответ</label>
                </div>
                <div class="form-group">
                    <label for="content-title">Ответ</label>
                    <input type="text" name="questions[0][answers][2][answer]" value="" class="form-control " id="content-title">
                    <input type="checkbox" class="form-check-input" name="questions[0][answers][2][is_correct]" id="exampleCheck1" >
                    <label class="form-check-label" for="exampleCheck1">Верный ответ</label>
                </div>

                <button class="btn btn-success" type="submit">Сохранить</button>
            </form>
        </div>
    </div>


    <div class="dropdown">
        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Добавить вопрос
        </button>
        <div class="dropdown-menu" style="width: 100%">
            <form method="POST" enctype="multipart/form-data" action="{{ route('courses-testStore', $id) }}">
                @csrf

                <div class="form-group">
                    <label for="content-title">Вопрос</label>
                    <input type="text" name="name" value="" class="form-control " id="content-title">
                </div>

                <button class="btn btn-success" type="submit">Сохранить</button>
            </form>
        </div>
    </div>



</div>
@endsection
