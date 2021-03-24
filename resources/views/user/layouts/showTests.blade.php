

<div class="container">
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
                    <a href="{{ route('custom-pass', $item) }}" class="btn btn-sm btn-success col-md-4">Показать</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
