@extends('layouts.template')

@section('content')
    <div class = " col-md-2  "  style = "background: white; border-radius: 10px; border: 4px double black;">
        <ul class="nav col-md-10">
            <li><a href="{{ route('users.index') }}">Просмотр пользователей</a></li>
            <li><a href="{{ route('users.create') }}">Добавить пользователя</a></li>
            <li><a href="{{ route('courses-all') }}">Просмотр  курсов</a></li>
            <li><a href="{{ route('courses-create') }}">Добавить курс</a></li>
        </ul>
    </div>

    <div class="container">
        <a href="{{route('courses-testCreate' , $id)}}" class="btn btn-success" style="align-self: ">Добавить тест</a>

        @if(session()->get('success'))
            <div class="alert alert-success mt-3">
                {{ session()->get('success') }}
            </div>
        @endif
    <table class="table mt-3"  >
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название теста</th>
            <th scope="col">Дата создания теста</th>


            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($courseItemTest as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td class="table-buttons">
                    <a href="{{ route('courses-show', $item) }}" class="btn btn-success">Показать</a>
                    <a href="{{ route('courses-testEdit', $item) }}" class="btn btn-primary">Редактировать</a>
                    <form method="post" action =  "{{ route('courses-destroy', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    </div>

@endsection

