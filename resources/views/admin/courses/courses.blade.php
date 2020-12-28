<div class="container">
    <h1>Курсы для обучения: </h1>
    @if(count($course))
        <div class="row justify-content-center">
            <table class="table table-bordered">
                <thead class="thead-dark">
                <tr>
                    @if($role == 'admin')
                        <th class="col-md-1">Изображение</th>
                        <th class="col-md-5">Название курса</th>
                        <th class="col-md-6">Редактировать/Удалить</th>
                    @endif
                    @if($role == 'teacher')
                        <th class="col-md-1">Изображение</th>
                        <th class="col-md-5">Название курса</th>
                        <th class="col-md-6">Редактировать/Удалить</th>
                    @endif
                    @if($role == 'user')
                        <th class="col-md-1">Изображение</th>
                        <th class="col-md-5">Название курса</th>
                        <th class="col-md-6">Просмотр</th>
                    @endif
                </tr>
                </thead>
                @foreach($course as $value)
                    <tr>
                        @if($role == 'admin')
                            <td><a href="{{ route('admin.courses-view', $value->id) }}"><img
                                        src="{{ route('file.get',$value->image) }}" class="rounded" width='50'
                                        height='50'></a>
                            </td>
                        @endif
                        @if($role == 'teacher')
                            <td><a href="{{ route('admin.courses-view', $value->id) }}"><img
                                        src="{{ route('file.get',$value->image) }}" class="rounded" width='50'
                                        height='50'></a>
                            </td>
                        @endif
                        @if($role == 'user')
                            <td><a href="{{ route('admin.courses-view', $value->id) }}"><img
                                        src="{{ route('file.get',$value->image) }}" class="rounded" width='50'
                                        height='50'></a>
                            </td>
                        @endif
                        <td>{{ $value->name }}</td>
                        <td>
                            @if($role == 'teacher')
                                <a href="{{ route('admin.courses-index', $value->id) }}"
                                   class="btn btn-success btn-lg">Добавить блок</a>
                                <a href="{{ route('admin.courses-view', $value->id) }}" class="btn btn-info btn-lg">Просмотр</a>
                                <a href="{{ route('admin.courses-edit', $value->id) }}"
                                   class="btn btn-primary btn-lg">Изменить</a>
                                <a href="{{ route('admin.courses-delete', $value->id) }}"
                                   class="btn btn-danger btn-lg">Удалить</a>
                            @endif
                            @if($role == 'admin')
                                <a href="{{ route('admin.courses-index', $value->id) }}"
                                   class="btn btn-success btn-lg">Добавить блок</a>
                                <a href="{{ route('admin.courses-view', $value->id) }}"
                                   class="btn btn-info btn-lg">Просмотр</a>
                                <a href="{{ route('admin.courses-edit', $value->id) }}"
                                   class="btn btn-primary btn-lg">Изменить</a>
                                <a href="{{ route('admin.courses-delete', $value->id) }}"
                                   class="btn btn-danger btn-lg">Удалить</a>
                            @endif
                            @if($role == 'user')
                                <a href="{{ route('admin.courses-view', $value->id) }}"
                                   class="btn btn-info btn-lg">Просмотр</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                {{ $course->links('paginate') }}
            </table>
            @endif
        </div>
</div>
