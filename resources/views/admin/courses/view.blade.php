@extends('admin.layouts.navbar')
@extends('layouts.template')
@section('content')
<div class="container">
    <div class="text-center">
{{--        {{dd(route('file.get'))}}--}}
        <img src="{{ route('file.get',$data->image) }}" class="rounded" width='200' height='200'>
        <h3>{{ $data->name }}</h3>
        <div class="center">
            <a href="{{ route('courses-edit', $data->id) }}" class="btn btn-primary btn-lg">Изменить</a>
            <a href="{{ route('courses-delete', $data->id) }}" class="btn btn-danger btn-lg">Удалить</a>
        </div>
    </div>
</div>
@endsection