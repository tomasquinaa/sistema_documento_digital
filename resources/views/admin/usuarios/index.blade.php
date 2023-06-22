@extends('layouts.base')

@section('content')

<div class="conteudo">

    <div class="titulo">
        <h2>Lista de Usuarios</h2>
    </div>

    <div class="form-central" style="margin-top: 0px;">
        <div class="btn btn-primary" style="margin-bottom: 10px;">
            <a href="{{ route('usuarios.create') }}" style="color: #fff;"><i class="bi bi-plus"></i> Cadastrar</a>
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
            <th>Usuários</th>
            <th>E-Mail</th>
            <th>Status</th>
            <th width="100">Ações</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($usuarios as $usuario)

                <tr>
                    <td>{{ $usuario->name}}</td>
                    <td>{{ $usuario->email}}</td>
                    @if ($usuario->status == 1)
                        <td>ATIVO</td>
                    @else 
                        <td>INATIVO</td>
                    @endif 
                    <td width="100">
                        <a href="{{ route('usuarios.edit', $usuario->id)}}" class="btn btn-primary btn-sm" style="color: #fff">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        @can('usuarios','exclui')
                        <a href="{{ route('usuarios.destroy', $usuario->id)}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
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

