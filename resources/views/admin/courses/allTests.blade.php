@extends('layouts.template')
@section('content')
    <a href="{{route('courses-test' , $id)}}" class="btn btn-success">Добавить тест</a>

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
{{--                    <a href="{{ route('tests.show', $item) }}" class="btn btn-success">Показать</a>--}}
{{--                    <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">Редактировать</a>--}}
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

@endsection
