

@extends('layouts.template')

@foreach($courseItems as $courseItem)
<div class="card">
    <h5 class="card-header">{{ $courseItem->description }}</h5>
    <div class="card-body">
        <p class="card-text">{{ $courseItem->text }}</p>
        <a href="#" class="btn btn-primary">Добавить контентый блок</a>
    </div>
</div>
@endforeach
