@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Добавление курса</h3>
    <form action="/admin/courses/submit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Название:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Введите название курса">
        </div>
        @include('errors.errors')
        <input type="submit" name="submit" value="Сохранить" class="btn btn-success">
    </form>
</div>
@endsection