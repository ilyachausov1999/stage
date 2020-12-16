@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Редактировать:</h3>
    <form method="post" enctype="multipart/form-data" action="{{ route('courses-update', $data->id)}}">
        @csrf
        <div class="form-group">
            <label>Название</label>
            <input name="name" class="form-control" value="{{$data->name}}">
        </div>
        @include('errors.errors')
        <input type="submit" name="submit" value="Сохранить" class="btn btn-primary btn-lg">
{{--        <input type="submit" name="content" value="Добавить контентные блоки" class="btn btn-primary btn-lg">--}}
{{--        <a href="/admin/courses/{id}/conten" class="btn btn-primary btn-lg" type="submit">Добавить</a>--}}

        <a href="{{ route('courses-index') }}" class="btn btn-primary btn-lg">Добавить блоки</a>
    </form>
</div>
@endsection
