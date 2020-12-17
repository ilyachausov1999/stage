
{{--@extends('admin.layouts.navbar')--}}

<div class="container">
    <div class="text-center">
        <h1>Курсы для обучения: </h1>
        @if(count($course))
        @foreach($course as $value)
        <div class="text-center">
        <a href="{{ route('courses-view', $value->id) }}"><img src="{{('/images/' . $value->image)}}" class="rounded" width='200' height='200'></a>
            <h3>{{ $value->name }}</h3>
            <div class="center">
                <a href="{{ route('courses-edit', $value->id) }}" class="btn btn-primary btn-lg">Изменить</a>
                <a href="{{ route('courses-delete', $value->id) }}" class="btn btn-primary btn-lg">Удалить</a>
                <a href="{{ route('courses-index', $value->id) }}" class="btn btn-primary btn-lg">Добавить блок</a>
            </div>
        </div>
        @endforeach

    </div>
    <div class="text-right">
        {{ $course->links() }}
    </div>
    @endif
</div>

