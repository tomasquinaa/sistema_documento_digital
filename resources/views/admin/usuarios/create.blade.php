@extends('layouts.base')

@section('content')

<div class="conteudo">

    <div class="titulo">
        <h2>Administração de Usuarios</h2>
    </div>

    <div class="form-central" style="margin-top: 0px;">
        <div class="btn btn-primary" style="margin-bottom:10px; margin-left: 10px;" >
            <a href="{{ route('usuarios.index') }}" style="color: #fff;">
                <i class="bi bi-arrow-return-left"></i>
            </a>
        </div>
    </div>

    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-warning">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif 

    <form method="post" action="{{ route('usuarios.store') }}">
        @csrf
        <div class="mb-3 col-md-4">
            <label for="exampleFormControlInput1" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3 col-md-4">
            <label for="exampleFormControlInput1" class="form-label">E-Mail:</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email">
        </div>
        <div class="mb-3 col-md-4">
            <label for="exampleFormControlInput1" class="form-label">Senha:</label>
            <input type="password" class="form-control" id="exampleFormControlInput1" name="password">
        </div>
        <div class="mb-3 col-md-4">
            <label for="password_confirmation" class="form-label">Confirme:</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="exampleFormControlInput1" name="password_confirmation">
            </div>
        </div>

        <div class="mb-3 col-md-4">
            <label for="password_confirmation" class="form-label">Grupo Usuário:</label>
            <div class="col-sm-8">
                <select class="form-control" name="grupo_id">
                    <option value="">Selecione</option>
                    @foreach($grupos as $grupo)
                        <option value="{{$grupo->id}}">{{$grupo->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group form-group-sm">
            <label for="control-label col-sm-2" for="status">Status:</label>
            <div class="col-sm-2">
                <input type="radio" name="status" checked value="1"> Ativo
            </div>
            <div class="col-sm-2">
                <input type="radio" name="status" value="0"> Inativo 
            </div>
        </div>
        @can('usuarios','inclui')
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        @endcan

       
    </form>

    
</div>
    
@endsection