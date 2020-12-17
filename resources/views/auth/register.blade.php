@section('content')
@extends('layouts.template')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2 col-md-offset-5"><h3>Регистрация</h3></div>
        <div class="col-md-8 col-md-offset-3">
            <div class="card">
                <div class="card-body">
                    @include('flash')
                    <form method="POST" action='{{ url("register/") }}'>
                        {!! csrf_field() !!}
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Логин:</label>
                            <div class="col-md-6">
                                <input type="text" name="login" id="login" class="form-control" value="{{ old('login') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Имя:</label>
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Фамилия:</label>
                            <div class="col-md-6">
                                <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">Email:</label>
                            <div class="col-md-6">
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-2 col-form-label text-md-right">Пароль:</label>
                            <div class="col-md-6">
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
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
