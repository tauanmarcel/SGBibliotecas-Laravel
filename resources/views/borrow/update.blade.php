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
                <label for="_clients_id">Cliente</label>
                <input name="_clients_id" id="_clients_id" class="form-control" value="{{ $borrow->client->name }}" disabled>
            </div>
            <div class="form-group col-6">
                <label for="_books_id">Livro</label>
                <input name="_books_id" id="_books_id" class="form-control" value="{{ $borrow->book->title }}" disabled>
            </div>
        </div>
        <div class="row">
            @if(!$borrow->status)
            <div class="form-group col-6">
                <label for="_status">Status</label>
                <input name="_status" id="_status" class="form-control" value="{{ $borrow->status ? 'Emprestado' : 'Devolvido' }}" disabled>
            </div>
            @else
            <div class="form-group col-6">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option>Selecione</option>
                    <option value="1" {{ $borrow->status ? 'selected' : '' }}>Emprestado</option>
                    <option value="0" {{ !$borrow->status ? 'selected' : '' }}>Devolvido</option>
                </select>
            </div>
            @endif
        </div>
        <input type="submit" class="btn btn-primary float-right" value="Salvar" {{ !$borrow->status ? 'disabled' : '' }}>
    </div>
</form>
@endsection
