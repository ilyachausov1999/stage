<div class="container">
    <h1>Все пользователи:</h1>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if($role == 'admin')
        <table class="table table-striped ">
            <thead>
            <tr>
                <th>Login</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Email</th>
                <th>Роль</th>
                <th>Аккаут создан:</th>
                <th>Actions</th>
            </tr>
            {{ $users->links('paginate') }}
            @foreach ($users as $userView)

            </thead>
            <tbody>
            <tr>
                <td>{{ $userView->login }}</td>
                <td>{{ $userView->name }}</td>
                <td>{{ $userView->surname }}</td>
                <td>{{ $userView->email }}</td>
                <td>{{ $userView->role->name }}</td>
                <td>{{ $userView->created_at }}</td>
                <td>
                    @csrf
                    @method('DELETE')
                    <form method="post" action="{{ route('admin.users.delete', $userView->id) }}">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Вы уверены, что хотите удалить пользователя?')"
                                class="btn btn-sm btn-danger col-md-8">Удалить
                        </button>
                    </form>
                    <a href="{{ route('admin.users.update', $userView->id) }}" class="btn btn-sm btn-primary col-md-8">Обновить</a>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-success dropdown-toggle col-md-8" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            Назначить курс
                        </button>
                        <div class="dropdown-menu">
                            <form name="course" enctype="multipart/form-data"
                                  action="{{ route($role .'.users.assignments.store', $userView->id) }}" method="POST">
                                @csrf
                                <select name="course">
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                                <button>Отправить</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>

            </tbody>
            @endforeach
        </table>
</div>
@endif
@if($role == 'teacher')
    <div class="container">
        <table class="table table-striped ">
            <thead>
            <tr>
                <th>Login</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Email</th>
                <th>Назначение на курс</th>
            </tr>
            {{ $users->links('paginate') }}
            @foreach ($users as $userView)
            </thead>
            <tbody>
            <tr>
                <td>{{ $userView->login }}</td>
                <td>{{ $userView->name }}</td>
                <td>{{ $userView->surname }}</td>
                <td>{{ $userView->email }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-success dropdown-toggle col-md-8" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            Назначить курс
                        </button>
                        <div class="dropdown-menu">
                            <form name="course" enctype="multipart/form-data"
                                  action="{{ route('admin.users.assignments.store', $userView->id) }}" method="POST">
                                @csrf
                                <select name="course">
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                                <button>Отправить</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>
            @endforeach
        </table>
    </div>
@endif
