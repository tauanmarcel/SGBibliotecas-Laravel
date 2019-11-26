@extends('layouts.app')

<center class="pt-3 pb-3"><h1>Clientes</h1></center>

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Endereço</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>João dos Santos</td>
            <td>joaodosantos@leitor.com</td>
            <td>(71) 99182-7364</td>
            <td>Rua Jorge Amado, 123, Rio vermelho</td>
        </tr>
    </tbody>
</table>
@endsection
