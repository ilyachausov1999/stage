<div class="container">
    <h3>Редактировать:</h3>
    <form method="post" enctype="multipart/form-data" action="{{ route('courses-update', $data->id)}}">
        @csrf
        <div class="form-group">
            <label>Название</label>
            <input name="name" class="form-control" value="{{$data->name}}">
        </div>
        <div class="form-group">
            <label>Изображение</label>
            <input type="file" name="image" class="form-control" value="{{$data->name}}">
            <h5>* максимальный размер изображения 1мб</h5>
        </div>
        @include('errors.errors')
        <input type="submit" name="submit" value="Сохранить" class="btn btn-success btn-lg">

    </form>
</div>