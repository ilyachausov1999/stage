{{--@extends('layouts.template')--}}

@section('title', 'контент')
@section('content')
@foreach($courseItems as $courseItem)
<div class="card">
    <h5 class="card-header">Заголовок : {{ $courseItem->description }}</h5>
    <hr>
    <div class="card-body">
        <p class="card-text">Текст : {{ $courseItem->text }}</p>
        <hr>
        @endforeach

    </div>
</div>
<div class="dropdown">
    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Добавить контентый блок
    </button>
    <div class="dropdown-menu" style="width: 100%">
        <form method="POST" enctype="multipart/form-data" action="{{ route('content.store') }}">
            @csrf

            <div class="form-group">
                <label for="content-title">Заголовок</label>
                <input type="text" name="description" value="" class="form-control " id="content-title">

            </div>
            <div class="form-group">
                <label for="content-body">Текст</label>
                <textarea type="text" name="text"  class="form-control" id="content-body"></textarea>
            </div>

            <div class="form-group">
                <label for="content-body">Курс ID</label>
                <input type="text" name="course_id" value="" class="form-control " id="content-id">
            </div>
            <button class="btn btn-success" type="submit">Добавить</button>
        </form>

    </div>
</div>
@endsection

