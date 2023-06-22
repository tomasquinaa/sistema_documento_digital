@extends('layouts.base')

@section('content')

<div class="conteudo">

    <div class="titulo">
        <h2>Administração de Grupos</h2>
    </div>

    <div class="form-central" style="margin-top: 0px;">
        <div class="btn btn-primary" style="margin-bottom:10px; margin-left: 10px;" >
            <a href="{{ route('grupos.index') }}" style="color: #fff;">
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

    <form method="post" action="{{ route('grupos.update', $grupo->id) }}">
        @csrf
        <div class="aba">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Grupo</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('permissoes.index', $grupo->id)}}">Permissões de Acesso</a>
                </li>
            </ul>
        </div>
        <div class="mb-3 col-md-4">
            <label for="exampleFormControlInput1" class="form-label">Grupo:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" value="{{ $grupo->nome }}">
        </div>
        @can('grupos','altera')
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        @endcan

       
    </form>

    
</div>
    
@endsection