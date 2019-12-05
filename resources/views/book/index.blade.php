@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{ $pageTitle }}</h1></center>

@section('content')
<a href="books/create" class="btn btn-primary float-right mb-3">Novo</a>
<a href="javascript:history.back()" class="btn btn-secondary float-right mb-3 mr-2">Voltar</a>
<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoria</th>
            <th>Ano de Publicação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($books))
            @foreach($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td><a href="books/abstract/{{ $book->id }}">{{ $book->title }}</a></td>
                    <td><a href="author/profile/{{ $book->id }}">{{ $book->author->name }}</a></td>
                    <td>{{ $book->category->title }}</td>
                    <td>{{ $book->year_publication }}</td>
                    <td>
                        <a href="books/update/{{ $book->id }}" class="mr-1"><i class="material-icons">edit</i></a>
                        <a href="" class="delete text-danger"><i class="material-icons">delete</i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
