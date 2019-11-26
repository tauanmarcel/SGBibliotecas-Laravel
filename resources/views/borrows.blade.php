@extends('layouts.app')

<center class="pt-3 pb-3"><h1>Empréstimos</h1></center>

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Livro</th>
            <th>Cliente</th>
            <th>Categoria</th>
            <th>Status</th>
            <th>Previsão de Entrega</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td><a href="book/1">O Diário de um Mago</a></td>
            <td><a href="client/1">João dos Santos</a></td>
            <td>Ficção</td>
            <td>Emprestado</td>
            <td>30/11/2019</td>
        </tr>
    </tbody>
</table>
@endsection
