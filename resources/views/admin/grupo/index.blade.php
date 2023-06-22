@extends('layouts.base')

@section('content')

<div class="conteudo">

    <div class="titulo">
        <h2>Lista de Grupo</h2>
    </div>

    <div class="form-central" style="margin-top: 0px;">
        <div class="btn btn-primary" style="margin-bottom: 10px;">
            <a href="{{ route('grupos.create') }}" style="color: #fff;"><i class="bi bi-plus"></i> Cadastrar</a>
        </div>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success hide-msg" style="float:left; width: 100%; margin: 10px 0px;">
            {{Session::get('success')}}
        </div>
    @endif

    <table class="table">
        <thead>
          <tr>
            <th>Grupo de Usuários</th>
            <th width="100">Ações</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($grupos as $grupo)

                <tr>
                    <td>{{ $grupo->nome}}</td>
                    <td width="100">
                        <a href="{{ route('grupos.edit', $grupo->id)}}" class="btn btn-primary btn-sm" style="color: #fff">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        @can('grupos','exclui')
                        <a href="{{ route('grupos.destroy', $grupo->id)}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                            <i class="bi bi-trash3"></i>
                        </a>
                        @endcan

                    </td>
                </tr>
                
            @endforeach
         
        </tbody>
      </table>

    
</div>

    
@endsection

