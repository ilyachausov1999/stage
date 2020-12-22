<div class="container">
    <table class="table table-striped ">
        <thead>
        <tr>
            <th>Login</th>
            <th>Имя</th>
            <th>Фамилия</th>
        </tr>
        @foreach ($assignments as $usersHasAssign)
        </thead>
        <tbody>
        <tr>
            <td>{{ $usersHasAssign->login }}</td>
            <td>{{ $usersHasAssign->name }}</td>
            <td>{{ $usersHasAssign->surname }}</td>
            <td></td>
            <td>
                @foreach($usersHasAssign->courses as $userCourses)
                    <p>{{$userCourses['name']}}</p>
{{--                <form method="post" action = "{{ route('assignments.delete', [$usersHasAssign->id, $userCourses->id])}}">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button  onclick="return confirm('Вы уверены, что хотите удалить пользователя?')" class="btn btn-sm btn-danger col-md-8">Удалить</button>--}}
{{--                </form>--}}
                @endforeach

{{--                @csrf--}}
{{--                @method('DELETE')--}}
{{--                <form method="post" action = "{{ route('users.delete', $userView->id) }}">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button  onclick="return confirm('Вы уверены, что хотите удалить пользователя?')" class="btn btn-sm btn-danger col-md-8">Удалить</button>--}}
{{--                </form>--}}
{{--                <a href="{{ route('users.update', $userView->id) }}" class="btn btn-sm btn-primary col-md-8">Обновить</a>--}}
{{--                <div class="dropdown">--}}
{{--                    <button class="btn btn-sm btn-success dropdown-toggle col-md-8" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        Назначить курс--}}
{{--                    </button>--}}
{{--                    <div class="dropdown-menu">--}}
{{--                        <form  enctype="multipart/form-data" action="{{ route('assignments.store', $userView->id) }}" method="POST">--}}
{{--                            @csrf--}}
{{--                            <select name="course">--}}
{{--                                @foreach($courses as $course)--}}
{{--                                    <option  value="{{$course->id}}">{{$course->name}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            <button>Отправить</button>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </td>
        </tr>
        </tbody>
        @endforeach
    </table>
</div>

