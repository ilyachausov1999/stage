<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Контентые блоки по курсу </title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
</head>

<body>
<div class="container">

    @foreach($courseItems as $courseItem)
        <div class="card" style="width: 100%;">
            <h5 class="card-header"><b>Заголовок : {{ $courseItem->description }}</b></h5>
            <hr>
            <div class="card-body">
                {!! $courseItem->text !!}
                <hr>
            </div>
        </div>
    @endforeach


    <div class="dropdown">

        <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
            Добавить контентый блок
        </button>
        <div class="dropdown-menu" style="width: 100%">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.courses-store', $id) }}">
                    @csrf

                    <div class="form-group">
                        <label for="content-title">Заголовок</label>
                        <input type="text" name="description" value="" class="form-control " id="description">

                    </div>
                    <div class="form-group">
                        <label for="content-body">Текст</label>
                        <textarea type="text" name="text" class="form-control" id="summernote"></textarea>
                        <script>
                            $('#summernote').summernote({

                                placeholder: 'Напиши что-нибудь',
                                tabsize: 5,
                                height: 200,
                                fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Times New Roman'],
                                toolbar: [
                                    ['style', ['style']],
                                    ['font', ['bold', 'underline', 'clear']],
                                    ['color', ['color']],
                                    ['para', ['ul', 'ol', 'paragraph']],
                                    ['table', ['table']],
                                    ['view', ['fullscreen', 'codeview',]]
                                ]

                            });
                        </script>
                    </div>

                    <div class="form-group">
                        <label>Изображение</label>
                        <input type="file" name="image" class="form-control">
                        <h5>* максимальный размер изображения 1мб</h5>
                    </div>


                    <button class="btn btn-success" type="submit">Добавить блок</button>
                </form>

        </div>
        <a href="{{route('admin.courses-all')}}" class="btn btn-primary" type="submit">На страницу курсов</a>
        <a href="{{route('admin.courses-testIndex' , $id)}}" class="btn btn-primary" type="submit">Добавить тест</a>
    </div>
</div>

{{--@endsection/--}}

