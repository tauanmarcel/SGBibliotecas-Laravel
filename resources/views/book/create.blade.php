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
                <label for="title">Título</label>
                <input name="title" id="title" class="form-control" required>
            </div>
            <div class="form-group col-6">
                <label for="year_publication">Ano de Publicação</label>
                <input name="year_publication" id="year_publication" class="form-control" maxlength="4" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6">
                <label for="authors_id">Autor</label>
                <select name="authors_id" id="authors_id" class="form-control" required>
                    <option>Selecione</option>
                    @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6">
                <label for="categories_id">Categoria</label>
                <select name="categories_id" id="categories_id" class="form-control" required>
                    <option>Selecione</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-6"> 
                <label for="cover">Resumo</label>
                <textarea name="abstract" class="form-control" id="cover" rows="4"></textarea>
            </div>
            <div class="form-group col-6"> 
                <label for="cover">Capa</label>
                <input type="file" name="cover" class="form-control-file" id="cover">
            </div>
        </div>
        <input type="submit" class="btn btn-primary float-right" value="Salvar">
    </div>
</form>
@endsection
