@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{$pageTitle}}</h1></center>

@section('content')
<div class="container">
    <div class="row">
            <div class="col-3 p-2">
                <img src="{{ url('storage/' . $author->image_path ) }}" alt="{{ $author->name }}" width="200">
            </div>
            <div class="col-9">
                <h2>{{ $author->name }}</h2>
                <p class="text-justify">{{ $author->profile_description }}</p>
            </div>
    </div>
</div>
@endsection