<div class="container">
    <a href="{{route( 'admin.courses-testCreate' , $id)}}" class="btn btn-sm btn-success ">Добавить
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
                    <a href="{{ route('admin.courses-show', $item) }}" class="btn btn-sm btn-success col-md-3">Показать</a>
                    <a href="{{ route('admin.courses-testEdit', $item) }}" class="btn btn-sm btn-primary col-md-3">Редактировать</a>
                    <form method="post" action="{{ route( 'admin.courses-destroy', $item->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger col-md-3">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


