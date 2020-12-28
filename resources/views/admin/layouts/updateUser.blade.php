<div class="container">
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
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="form"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="user-login">Логин</label>
                    <p>*это поле является обязательным</p>
                    <input name="login" value="{{$user['login']}}" class="form-control " id="user-login">

                </div>
                <div class="form-group">
                    <label for="user-name">Имя</label>
                    <p>*это поле является обязательным</p>
                    <input name="name" value="{{$user['name']}}" class="form-control " id="user-name">

                </div>
                <div class="form-group">
                    <label for="user-surname">Фамилия</label>
                    <input name="surname" value="{{$user['surname']}}" class="form-control" id="user-surname">

                </div>
                <div class="form-group">
                    <label for="user-birthdate">Дата рождения</label>
                    <p>*это поле является обязательным</p>
                    <input type="date" name="birthdate" value="{{date("y.m.d", strtotime($user['birthdate']))}}"
                           class="form-control " id="user-birthdate">

                </div>
                <div class="form-group">
                    <label for="user-email">Email</label>
                    <input name="email" value="{{$user['email']}}" class="form-control" id="user-email">

                </div>

                <div class="form-group">
                    <label for="user-password">Пароль</label>
                    <input type="password" name="password" maxlength="25" size="40" value="" class="form-control"
                           id="user-password">

                </div>
                <div class="form-group">
                <select name="role">
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-success col-md-3">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>
