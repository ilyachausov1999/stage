@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Курсы для обучения: </h3>
    @if(count($course))
    <div class="row justify-content-center">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Курс</th>
                    <th>Редактировать/Удалить</th>
                </tr>
            </thead>
            @foreach($course as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>
                    <a href="{{ route('courses-view', $value->id) }}" class="btn btn-success">Просмотр</a>
                    <a href="{{ route('courses-edit', $value->id) }}" class="btn btn-info">Изменить</a>
                    <a href="{{ route('courses-delete', $value->id) }}" class="btn btn-danger">Удалить</a>
                </td>
            </tr>
            @endforeach
        </table>
        <a class="btn btn-info" name="save" href="{{ route('courses-create') }}">Добавить</a>
    </div>
    {{ $course->links() }}
    @endif
</div>
@endsection