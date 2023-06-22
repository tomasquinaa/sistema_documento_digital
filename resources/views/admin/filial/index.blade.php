@extends('layouts.base')

@section('content')

<div class="conteudo">

    <div class="titulo">
        <h2>Lista de Filial</h2>
    </div>

    <div class="form-search col-md-2" style="margin-bottom:20px;">
        <form class="d-flex" role="search" method="get" action="{{ route('filials.search') }}">
            <input class="form-control me-2" type="search" name="nome" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
        </form>
    </div>

    <div class="form-central" style="margin-top: 0px;">
        <div class="btn btn-primary" style="margin-bottom: 10px;">
            <a href="{{ route('filials.create') }}" style="color: #fff;"><i class="bi bi-plus"></i> Cadastrar</a>
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
            <th>Filial</th>
            <th width="100">Ações</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($filials as $filial)

                <tr>
                    <td>{{ $filial->nome}}</td>
                    <td width="100">
                        <a href="{{ route('filials.edit', $filial->id)}}" class="btn btn-primary btn-sm" style="color: #fff">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        @can('filials', 'exclui')
                        <a href="{{ route('filials.destroy', $filial->id)}}" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModal">
                            <i class="bi bi-trash3"></i>
                        </a>
                        @endcan 

                    </td>
                </tr>
                
            @endforeach
         
        </tbody>
      </table>

      @if( isset($dataForm) )
        {!! $filials->appends($dataForm)->links() !!}
        @else 
        {!! $filials->links() !!}
    @endif

    
</div>

    
@endsection

