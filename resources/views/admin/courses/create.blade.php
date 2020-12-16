
<div class="container">
    <h3>Добавление курса</h3>
    <form action="/admin/courses/submit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Название:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Введите название курса">
        </div>
        <div class="form-group">
            <label>Изображение</label>
            <input type="file" name="image" class="form-control" >
        </div>
        @include('errors.errors')
        <input type="submit" name="submit" value="Сохранить" class="btn btn-primary btn-lg">
    </form>
</div>
