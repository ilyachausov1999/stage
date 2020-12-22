@extends('layouts.template')
@section('template')
@section('content')
<div class="container">
    @foreach($courseItems as $courseItem)
    <div class="card" style="width: 100%;">
        <img src="{{ route('file.get',$courseItem->image) }}" class="rounded" width='200' height='200'>
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
                    <textarea type="text" name="text" style="height: 20rem;" class="form-control" id="content-body"></textarea>
                </div>
                <div class="form-group">
                    <label>Изображение</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button class="btn btn-success" type="submit">Добавить блок</button>
            </form>

        </div>
        <a href="/admin/courses" class="btn btn-primary" type="submit">На страницу курсов</a>
        <a href="{{route('courses-test' , $id)}}" class="btn btn-primary" type="submit">Добавить тест</a>
    </div>
</div>
@endsection
