@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{$pageTitle}}</h1></center>

@section('content')

<div class="table mb-5">
    <a href="javascript:history.back()" class="btn btn-secondary float-right">Voltar</a>
</div>

<div class="container">
    <div class="row">
            <div class="col-3 p-2">
                <img src="{{ url('storage/' . $client->image_path ) }}" alt="{{ $client->name }}" width="200">
            </div>
            <div class="col-9">
                <h2>{{ $client->name }}</h2>
                <p class="text-justify">
                    <span class="d-flex"><b>E-mail:&nbsp;</b> {{ $client->email }}</span>
                    <span class="d-flex"><b>Telefone:&nbsp;</b> {{ $client->phone }}</span>
                    <span class="d-flex"><b>Data de nascimento:&nbsp;</b> {{ $client->date_of_birth_br }}</span>
                    <span class="d-flex"><b>Endereço:&nbsp;</b> {{ $client->address }}</span>
                </p>
            </div>
    </div>
</div>
@endsection