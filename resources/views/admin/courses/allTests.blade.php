<div class="container">
    <a href="{{route( 'admin.courses-testCreate' , $id)}}" class="btn btn-success" style="align-self: ">Добавить
        тест</a>
    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif
    <table class="table mt-3">
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
                    <a href="{{ route('admin.courses-show', $item) }}" class="btn btn-success">Показать</a>
                    <a href="{{ route('admin.courses-testEdit', $item) }}" class="btn btn-primary">Редактировать</a>
                    <form method="post" action="{{ route( 'admin.courses-destroy', $item->id) }}">
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


