@extends('layouts.template')
@section('template')
@section('content')
    <div class="container">
        @foreach($courseItems as $courseItem)
            <div class="card" style="width: 100%;">
                <h5 class="card-header"><b>Заголовок : {{ $courseItem->description }}</b></h5>
                <hr>
                <div class="card-body">
                    <p class="card-text"> {{ $courseItem->text }}</p>
                    <hr>
                </div>
            </div>
        @endforeach

        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Добавить контентый блок
            </button>
            <div class="dropdown-menu" style="width: 100%">
                <form method="POST" enctype="multipart/form-data" action="{{ route('courses-store', $id) }}">
                    @csrf

                    <div class="form-group">
                        <label for="content-title">Заголовок</label>
                        <input type="text" name="description" value="" class="form-control " id="content-title">

                    </div>
                    <div class="form-group">
                        <label for="content-body">Текст</label>
                        <textarea type="text" name="text"  style="height: 20rem;" class="form-control" id="content-body"></textarea>
                    </div>

                    <button class="btn btn-success" type="submit">Добавить блок</button>
                </form>
            </div>
            <a href="/admin/courses" class="btn btn-primary" type="submit" >На страницу курсов</a>
        </div>



            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Добавить блок-тест
                </button>
                <div class="dropdown-menu" style="width: 100%">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('courses-testStore', $id) }}">
                        @csrf

                        <div class="form-group">
                            <label for="content-title">Название теста</label>
                            <input type="text" name="test_name" value="" class="form-control " id="content-title">
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
                            <input type="text" name="questions" value="" class="form-control " id="content-title">
                        </div>

                        <button class="btn btn-success" type="submit">Сохранить</button>
                    </form>
                </div>
            </div>


</div>
@endsection

