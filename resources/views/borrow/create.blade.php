@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{$pageTitle}}</h1></center>

@section('content')

<div class="table mb-5">
    <a href="javascript:history.back()" class="btn btn-secondary float-right">Voltar</a>
</div>

@include('layouts.response')

<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">
            <div class="form-group col-6">
                <label for="clients_id">Cliente</label>
                <select name="clients_id" id="clients_id" class="form-control" required>
                    <option>Selecione</option>
                    @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="books_id">Livro</label>
                <select name="books_id" id="books_id" class="form-control" required>
                    <option>Selecione</option>
                    @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-primary float-right" value="Salvar">
    </div>
</form>
@endsection
