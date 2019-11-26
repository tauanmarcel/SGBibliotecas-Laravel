@extends('layouts.app')

<center class="pt-3 pb-3"><h1>Livros</h1></center>

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Categoria</th>
            <th>Ano de Publicação</th>
            <th>Editora</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><a href="book/1">O Diário de um Mago</a></td>
            <td><a href="author/1">Paulo Coelho</a></td>
            <td>Ficção</td>
            <td>1996</td>
            <td>Não informado</td>
        </tr>
    </tbody>
</table>
@endsection
