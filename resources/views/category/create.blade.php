@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{$pageTitle}}</h1></center>

@section('content')

<div class="table mb-5">
    <a href="javascript:history.back()" class="btn btn-secondary float-right">Voltar</a>
</div>

@include('layouts.response')

<form method="post">
    @csrf
    <div class="content">
        <div class="row">   
            <div class="form-group col-6">
                <label for="title">Título</label>
                <input name="title" id="title" class="form-control" required>
            </div>
        </div>
        <div class="row"> 
            <div class="form-group col-6">
                <input type="submit" class="btn btn-primary float-right" value="Salvar">
            </div>
        </div>
    </div>
</form>
@endsection
