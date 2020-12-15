<div class="container">

    <table class="table table-striped">
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
                <a href="" class="btn btn-sm btn-danger">Удалить</a>
                <a href="" class="btn btn-sm btn-primary">Обновить</a>
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Назначить курс
                        </button>
                            <div class="dropdown-menu">
                                <li><a class="dropdown-item" href="/">Курс 1</a></li>
                                <li><a class="dropdown-item" href="#">Курс 2</a></li>
                                <li><a class="dropdown-item" href="#">Курс 3</a></li>
                            </div>
                    </div>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>

</div>

