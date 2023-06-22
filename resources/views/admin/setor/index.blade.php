@extends('layouts.base')

@section('content')

<div class="conteudo">

    <div class="titulo">
        <h2>Lista de Setores</h2>
    </div>

    <div class="form-search col-md-2" style="margin-bottom:20px;">
        <form class="d-flex" role="search" method="get" action="{{ route('setores.search') }}">
            <input class="form-control me-2" type="search" name="nome" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>
    </div>

    <div class="form-central" style="margin-top: 0px;">
        <div class="btn btn-primary" style="margin-bottom: 10px;">
            <a href="{{ route('setores.create') }}" style="color: #fff;"><i class="bi bi-plus"></i> Cadastrar</a>
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
            <th>E-Mail</th>
            <th width="100">Ações</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($setores as $setor)

                <tr>
                    <td>{{ $setor->nome}}</td>
                    <td width="100">
                        <a href="{{ route('setores.edit', $setor->id)}}" class="btn btn-primary btn-sm" style="color: #fff">
                            <i class="bi bi-pencil-square"></i>
                        </a>

                        @can('setores', 'exclui')
                        <a href="{{ route('setores.destroy', $setor->id)}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                            <i class="bi bi-trash3"></i>
                        </a>
                        @endcan

                    </td>
                </tr>
                
            @endforeach
         
        </tbody>
      </table>

      @if( isset($dataForm) )
        {!! $setores->appends($dataForm)->links() !!}
        @else 
        {!! $setores->links() !!}
    @endif

    
</div>

    
@endsection

