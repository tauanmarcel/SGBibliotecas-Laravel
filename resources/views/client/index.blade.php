@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{$pageTitle}}</h1></center>

@section('content')

<a href="clients/create" class="btn btn-primary float-right mb-3">Novo</a>
<a href="javascript:history.back()" class="btn btn-secondary float-right mb-3 mr-2">Voltar</a>

<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Idade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($clients))
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td><a href="clients/profile/{{ $client->id }}">{{ $client->name }}</a></td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->age }}</td>
                    <td>
                        <a href="clients/update/{{ $client->id }}">Editar</a>
                        <a href="#">Excluir</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
