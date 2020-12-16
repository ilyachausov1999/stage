@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        @isset ($path)
        <img src="{{ asset('/storage/' . $path) }}" class="rounded">
        @endisset
        <h3>{{ $data->name }}</h3>
        <div class="center">
            <a href="{{ route('courses-edit', $data->id) }}" class="btn btn-primary btn-lg">Изменить</a>
            <a href="{{ route('courses-delete', $data->id) }}" class="btn btn-secondary btn-lg">Удалить</a>
        </div>
    </div>
</div>
@endsection