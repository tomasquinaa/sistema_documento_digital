@extends('layouts.base')

@section('content')

<div class="conteudo">

    <div class="titulo">
        <h2>Administração de Filial</h2>
    </div>

    <div class="form-central" style="margin-top: 0px;">
        <div class="btn btn-primary" style="margin-bottom:10px; margin-left: 10px;" >
            <a href="{{ route('filials.index') }}" style="color: #fff;">
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

    <form method="post" action="{{ route('filials.store') }}">
        @csrf
        <div class="mb-3 col-md-4">
            <label for="exampleFormControlInput1" class="form-label">Filial:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" value="{{ old('nome') }}">
        </div>

        @can('filials', 'inclui')
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        @endcan 

       
    </form>

    
</div>
    
@endsection