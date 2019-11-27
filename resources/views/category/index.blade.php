@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{ $pageTitle }}</h1></center>

@section('content')
<a href="categories/create" class="btn btn-primary float-right mb-3">Novo</a>
<table class="table">
    <thead>
        <tr>
            <th>Código</th>
            <th>Título</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($categories))
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>
                    <a href="categories/update/{{ $category->id }}">Editar</a>
                    <a href="#">Excluir</a></p>
                </td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection
