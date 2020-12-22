@extends('layouts.template')
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
    <div class="text-center">
        <a href="{{ route('custom-courses') }}" class="btn btn-primary" type="submit">Вернуться к курсам</a>
    </div>
</div>
@endsection