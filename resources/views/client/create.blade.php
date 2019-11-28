@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{$pageTitle}}</h1></center>

@section('content')

<div class="table mb-5">
    <a href="javascript:history.back()" class="btn btn-secondary float-right">Voltar</a>
</div>

@include('layouts.response')

<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="content">
        <div class="row">   
            <div class="form-group col-6">
                <label for="name">Nome</label>
                <input name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group col-6">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" class="form-control"  required>
            </div>
        </div>
        <div class="row">   
            <div class="form-group col-6">
                <label for="phone">Telefone</label>
                <input name="phone" id="phone" class="form-control" required>
            </div>
            <div class="form-group col-6">
                <label for="birth">Data de Nascimento</label>
                <input name="birth" id="birth" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <p class="d-flex p-2 bg-light">Endereço</p>
            <div class="row">
                <div class="form-group col-6">
                    <label for="street">Rua</label>
                    <input type="street" name="street" id="street" class="form-control"  required>
                </div>
                <div class="form-group col-6">
                    <label for="number">Número</label>
                    <input type="number" name="number" id="number" class="form-control"  required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="neighborhood">Bairro</label>
                    <input type="neighborhood" name="neighborhood" id="neighborhood" class="form-control"  required>
                </div>
                <div class="form-group col-6">
                    <label for="city">Cidade</label>
                    <input type="city" name="city" id="city" class="form-control"  required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="state">Estado</label>
                    <input type="state" name="state" id="state" class="form-control"  required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6"> 
                    <label for="avatar">Foto</label>
                    <input type="file" name="avatar" class="form-control-file" id="avatar">
                </div>
            </div>
        </div>
        <input type="submit" class="btn btn-primary float-right mb-5" value="Salvar">
    </div>
</form>
@endsection
