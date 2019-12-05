@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{$pageTitle}}</h1></center>

@section('content')

<a href="authors/create" class="btn btn-primary float-right mb-3">Novo</a>
<a href="javascript:history.back()" class="btn btn-secondary float-right mb-3 mr-2">Voltar</a>

<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Livros</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($authors))
        @foreach($authors as $author)
        <tr>
            <td>{{ $author->id }}</td>
            <td><a href="authors/profile/{{ $author->id }}">{{ $author->name }}</a></td>
            <td><a href="books-author/{{ $author->id }}">Publicações</a></td>
            <td>
                <a class="mr-1" href="authors/update/{{ $author->id }}">
                    <i class="material-icons">edit</i>
                </a>
                <a class="delete text-danger" href="authors/{{ $author->id }}">
                    <i class="material-icons">delete</i>
                </a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection
