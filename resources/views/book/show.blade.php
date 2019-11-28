@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{ $pageTitle }}</h1></center>

@section('content')

<div class="table mb-5">
    <a href="javascript:history.back()" class="btn btn-secondary float-right">Voltar</a>
</div>

<div class="container">
    <div class="row">
            <div class="col-3 p-2">
                <img src="{{ url('storage/' . $book->cover ) }}" alt="{{ $book->titel }}" width="200">
            </div>
            <div class="col-9">
                <h2>{{ $book->title }}</h2>
                <p class="text-justify">{{ $book->abstract }}</p>
            </div>
    </div>
</div>
@endsection