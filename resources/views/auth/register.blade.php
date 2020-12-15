@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Регистрация') }}</div>
                <div class="card-body">
                    <form method="POST" action='{{ url("register/") }}'>
                        {!! csrf_field() !!}
                        <div class="form-group row">
                            <label for="name">Логин:</label>
                            <input type="text" name="login" id="login" class="form-control" value="{{ old('login') }}">
                        </div>
                        <div class="form-group row">
                            <label for="name">Имя:</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group row">
                            <label for="name">Фамилия:</label>
                            <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}">
                        </div>
                        <div class="form-group row">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                        </div>
                        <div class="form-group row">
                            <label for="password">Пароль:</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        @include('errors.errors')
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection