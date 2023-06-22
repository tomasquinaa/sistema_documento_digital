@extends('layouts.base')

@section('content')

<div class="conteudo">

    <div class="titulo">
        <h2>Mudança de Senha</h2>
    </div>


    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-warning">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif 

    @if(Session::has('success'))
        <div class="alert alert-success hide-msg" style="float:left; width: 100%; margin: 10px 0px;">
            {{Session::get('success')}}
        </div>
    @endif

    <form method="post" action="{{ route('usuario.password.update') }}">
        <input type="hidden" name="_method" value="PUT">
        @csrf
  
        <div class="mb-3 col-md-4">
            <label for="password_anterior" class="form-label">Senha Anterior:</label>
            <input type="password" class="form-control" name="password_anterior">
        </div>
        <div class="mb-3 col-md-4">
            <label for="exampleFormControlInput1" class="form-label">Senha Nova:</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="mb-3 col-md-4">
            <label for="password_confirmation" class="form-label">Confirme:</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" name="password_confirmation">
            </div>
        </div>

        @can('usuarios','inclui')
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
        @endcan

        
    @if(isset($errors) && count($errors) > 0)
    <div class="alert alert-warning">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
    @endif 

    @if(Session::has('success'))
        <div class="alert alert-success hide-msg" style="float:left; width: 100%; margin: 10px 0px;">
            {{Session::get('success')}}
        </div>
    @endif

       
    </form>

    
</div>
    
@endsection