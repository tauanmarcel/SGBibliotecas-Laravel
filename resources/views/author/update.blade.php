@extends('layouts.app')

<center class="pt-3 pb-3"><h1>{{ $pageTitle }}</h1></center>

@section('content')

<div class="table mb-5">
    <a href="javascript:history.back()" class="btn btn-secondary float-right">Voltar</a>
</div>

@include('layouts.response')

<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $author->name }}" required>
    </div>
    <div class="form-group">
        <label for="profile_description">Descrição</label>
        <textarea name="profile_description" id="profile_description" class="form-control" rows="4">
            {{ $author->profile_description }}
        </textarea>
    </div>
    <div class="form-group"> 
        <label for="avatar">Foto</label><br>
        @if($author->image_path)
            <img src="{{url('storage/'. $author->image_path)}}" alt="{{ $author->name }}" width="50">
        @endif
        <input type="file" name="avatar" class="form-control-file mt-2" id="avatar">
    </div>
    <input type="submit" class="btn btn-primary" value="Salvar">
</form>
@endsection
