@extends('layouts.template')
@section('template')
@section('content')

<div class="container">
    <div div class = "col-xs-12 col-md-2 rounded "  style = " border-radius: 10px; border: 4px double black;">
    @foreach($courseItemTest as $item)
        <div class="card" style="width: 100%;">
            <h5 class="card-header"><b>Заголовок : {{ $item->name }}</b></h5>
        </div>
    @endforeach
    </div>

    <div >
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
                    <input type="text" name="questions" value="" class="form-control " id="content-title">
                </div>

                <div class="form-group">
                    <label for="content-title">Ответ</label>
                    <input type="text" name="answers" value="" class="form-control " id="content-title">
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
