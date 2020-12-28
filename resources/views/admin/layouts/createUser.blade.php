
<div class="container">
    <h1>Добавить пользователя</h1>
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="error_form">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form enctype="multipart/form-data" action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="user-login">Логин</label>
                    <p>*это поле является обязательным</p>
                    <input name="login" value="{{old('login')}}" class="form-control " id="user-login">

                </div>
                <div class="form-group">
                    <label for="user-name">Имя</label>
                    <p>*это поле является обязательным</p>
                    <input name="name" value="{{old('name')}}" class="form-control " id="user-name">

                </div>
                <div class="form-group">
                    <label for="user-surname">Фамилия</label>
                    <input name="surname" value="{{old('surname')}}" class="form-control" id="user-surname">

                </div>
                <div class="form-group">
                    <label for="user-birthdate">Дата рождения</label>
                    <p>*это поле является обязательным</p>
                    <input type="date" name="birthdate" value="{{old('birthdate')}}" class="form-control " id="user-birthdate">

                </div>
                <div class="form-group">
                    <label for="user-email">Email</label>
                    <input name="email" value="{{old('email')}}" class="form-control" id="user-email">

                </div>

                <div class="form-group">
                    <label for="user-password">Пароль</label>
                    <input type="password" name="password" maxlength="25" size="40" value="" class="form-control" id="user-password">

                </div>
                    <select name="role">
                        @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                <div class="form-group">
                    <label for="user-address">Course</label>
                    <div class="dropdown">
{{--                        <button class="btn btn-success dropdown-toggle col-md-2" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            Назначить курс--}}
{{--                        </button>--}}
{{--                        <div class="dropdown-menu">--}}
{{--                            <li><a class="dropdown-item" href="/">Курс 1</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Курс 2</a></li>--}}
{{--                            <li><a class="dropdown-item" href="#">Курс 3</a></li>--}}
{{--                        </div>--}}
                        <button class="btn btn-success col-md-3">Отправить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

