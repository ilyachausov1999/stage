<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <table class="table table-striped ">
        <thead>
        <tr>
            <th>Login</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Название курса</th>
        </tr>
        @foreach ($assignments as $usersHasAssign)
        </thead>
        <tbody>
        <tr>
            <td>{{ $usersHasAssign->users['login'] }}</td>
            <td>{{ $usersHasAssign->users['name'] }}</td>
            <td>{{ $usersHasAssign->users['surname'] }}</td>
            <td><p>{{ $usersHasAssign->courses['name'] }}</p>
            <td>
                <form method="post" action="{{ route('assignments.delete', $usersHasAssign->id) }}">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Вы уверены, что хотите отменить курс?')"
                            class="btn btn-sm btn-danger col-md-8">Отменить курс
                    </button>
                </form>
            </td>
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
</div>

