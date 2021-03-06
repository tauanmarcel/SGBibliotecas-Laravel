@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{ $pageTitle }}</h1></center>

@section('content')

<a href="categories/create" class="btn btn-primary float-right mb-3">Novo</a>
<a href="javascript:history.back()" class="btn btn-secondary float-right mb-3 mr-2">Voltar</a>

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
                    <a href="categories/update/{{ $category->id }}" class="mr-1"><i class="material-icons">edit</i></a>
                    <a href="#" class="delete text-danger"><i class="material-icons">delete</i></a></p>
                </td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endsection
