@extends('layouts.app')

<center class="pt-3 pb-3"><h1>Home</h1></center>

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
            <td>Peter Pan</td>
            <td>João dos Santos</td>
            <td>Conto Infantil</td>
            <td>Emprestado</td>
            <td>30/11/2019</td>
        </tr>
        <tr>
            <td>2</td>
            <td>João dos Santos</td>
            <td>Pequeno Príncipe</td>
            <td>Conto Infantil</td>
            <td>Emprestado</td>
            <td>30/11/2019</td>
        </tr>
        <tr>
            <td>3</td>
            <td>João dos Santos</td>
            <td>Pokemón</td>
            <td>Conto Infantil</td>
            <td>Emprestado</td>
            <td>30/11/2019</td>
        </tr>

    </tbody>
</table>
@endsection
