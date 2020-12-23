@extends('layouts.template')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('courses-update', $test) }}">
                    @csrf
                    @method('PATCH')
                        <form method="post" enctype="multipart/form-data" action="">
                            <div class="form-group">
