@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{ $pageTitle }}</h1></center>

@section('content')
<a href="borrows/create" class="btn btn-primary float-right mb-3">Novo</a>
<a href="javascript:history.back()" class="btn btn-secondary float-right mb-3 mr-2">Voltar</a>
<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Cliente</th>
            <th>Livro</th>
            <th>Data do Empréstimo</th>
            <th>Previsão de Devolução</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($borrows))
            @foreach($borrows as $borrow)
                <tr>
                    <td>{{ $borrow->id }}</td>
                    <td>{{ $borrow->client->name }}</td>
                    <td>{{ $borrow->book->title }}</td>
                    <td>{{ $borrow->date_borrow }}</td>
                    <td>{{ $borrow->date_devolution }}</td>
                    <td class="{{ $borrow->status ? ' text-danger' : 'text-info' }}">{{ $borrow->status ? 'Emprestado' : 'Devolvido' }}</td>
                    <td>
                        <a href="borrows/update/{{ $borrow->id }}">Editar</a>
                        <a href="#">Excluir</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
@endsection
