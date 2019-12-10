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
                <input name="phone" id="phone" class="form-control cel_phone" required>
            </div>
            <div class="form-group col-6">
                <label for="birth">Data de Nascimento</label>
                <input name="birth" id="birth" class="form-control date datepicker" autocomplete="off" required>
            </div>
        </div>
        <div class="row">   
            <div class="form-group col-6"> 
                <label for="avatar">Foto</label>
                <input type="file" name="avatar" class="form-control-file" id="avatar">
            </div>
        </div>
        <div class="form-group">
            <p class="d-flex p-2 bg-light">Endereço</p>
            <div class="row">
                <div class="form-group col-6">
                    <label for="state">Estado</label>
                    <select type="state" name="state" id="state" class="form-control states"  required>
                        <option>Selecione</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="EX">Estrangeiro</option>
                    </select>
                </div>
                <div class="form-group col-6">
                    <label for="city">Cidade</label>
                    <select type="city" name="city" id="city" class="form-control cities"  required>
                        <option>Selecione</option>
                    </select>
                </div>
            </div>
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
            </div>
        </div>
        <input type="submit" class="btn btn-primary float-right mb-5" value="Salvar">
    </div>
</form>
@endsection
