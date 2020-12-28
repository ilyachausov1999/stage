@extends('layouts.template')
@section('content')
<div class="container">
    <div class="text-center">
        <div class="slogan-block">
            <h1 class="land">Учись, развивайся!</h1>
            <h3 class="land">Наша команда подготовила обучающие курсы для твоего старта</h3>
        </div>
        <a href="{{ route('custom-courses') }}" class="btn btn-primary btn-lg">Начать</a>
    </div>
</div>
@endsection
