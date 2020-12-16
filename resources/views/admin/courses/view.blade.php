@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <th>{{ $data->id }}</th>
            </tr>
            <tr>
                <th>Название</th>
                <th>{{ $data->name }}</th>
            </tr>
        </tbody>
    </table>
</div>
@endsection