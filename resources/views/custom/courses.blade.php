@extends('layouts.default')
@section('content')
<div class="container">
    <div class="text-center">
        <h1>Курсы для обучения: </h1>
        @if(count($course))
        @foreach($course as $value)
        <div class="text-center">
       <a href="{{ route('courses-view', $value->id) }}"><img src="{{ route('file.get',$value->image) }}" class="rounded" width='200' height='200'></a>
            <h3>{{ $value->name }}</h3>
            <div class="center">
                <a href="{{ route('custom-view', $value->id) }}" class="btn btn-primary btn-lg">Подробнее</a>
            </div>
        </div>
        @endforeach
        {{ $course->links('paginate') }}
    </div>
    @endif
</div>
@endsection