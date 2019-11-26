@extends('layouts.app')

<center class="pt-3 pb-3"><h1>Autores</h1></center>

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Livros</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><a href="author/1">Paulo Coelho</a></td>
            <td><a href="books-author/1">Lista de livros</a></td>
        </tr>
    </tbody>
</table>
@endsection
