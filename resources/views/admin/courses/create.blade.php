<div class="container">
    <h1>Добавление курса</h1>
    <form action="/admin/courses/submit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Название:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Введите название курса">
        </div>
        <div class="form-group">
            <label>Изображение</label>
            <input type="file" name="image" class="form-control">
            <h5>* максимальный размер изображения 1мб</h5>
        </div>
        @include('errors.errors')
        <input type="submit" name="submit" value="Сохранить" class="btn btn-success btn-lg">
    </form>
</div>
