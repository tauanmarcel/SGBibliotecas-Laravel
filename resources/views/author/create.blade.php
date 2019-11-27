@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{ $pageTitle }}</h1></center>

@section('content')

@include('layouts.response')

<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input name="name" id="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="profile_description">Descrição</label>
        <textarea name="profile_description" id="profile_description" class="form-control" rows="4"></textarea>
    </div>
    <div class="form-group"> 
        <label for="avatar">Foto</label>
        <input type="file" name="avatar" class="form-control-file" id="avatar">
    </div>
    <input type="submit" class="btn btn-primary float-right" value="Salvar">
</form>
@endsection
