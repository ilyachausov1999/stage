<div class="container">
    <h1>Курсы для обучения: </h1>
    @if(count($course))
    <div class="row justify-content-center">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th class="col-md-1">Изображение</th>
                    <th class="col-md-5">Название курса</th>
                    <th class="col-md-6">Редактировать/Удалить</th>
                </tr>
            </thead>
            @foreach($course as $value)
            <tr>
                <td><a href="{{ route('courses-view', $value->id) }}"><img src="{{ route('file.get',$value->image) }}" class="rounded" width='50' height='50'></a></td>
                <td>{{ $value->name }}</td>
                <td>
                    <a href="{{ route('courses-index', $value->id) }}" class="btn btn-success btn-lg">Добавить блок</a>
                    <a href="{{ route('courses-view', $value->id) }}" class="btn btn-info btn-lg">Просмотр</a>
                    <a href="{{ route('courses-edit', $value->id) }}" class="btn btn-primary btn-lg">Изменить</a>
                    <a href="{{ route('courses-delete', $value->id) }}" class="btn btn-danger btn-lg">Удалить</a>
                </td>
            </tr>
            @endforeach
            {{ $course->links('paginate') }}
        </table>
        @endif
    </div>
</div>