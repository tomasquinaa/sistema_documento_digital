@extends('layouts.base')

@section('content')

<div class="conteudo">

    <div class="titulo">
        <h2>Administração de Permissões de Acesso</h2>
    </div>

    <div class="form-central" style="margin-top: 0px;">
        <div class="btn btn-primary" style="margin-bottom:10px; margin-left: 10px;" >
            <a href="" style="color: #fff;">
                {{-- {{ route('permissoes.index') }} --}}
                <i class="bi bi-arrow-return-left"></i>
            </a>
        </div>
    </div>

    @if(Session::has('success'))
        <div class="alert alert-success hide-msg" style="float:left; width: 100%; margin: 10px 0px;">
            {{Session::get('success')}}
        </div>
    @endif


    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-warning">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif 

    <form method="post" action="{{ route('permissoes.update', $formgrupo->id) }}">
        @csrf
        <div class="aba">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('grupos.edit', $grupo->id)}}">Grupo</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="{{ route('permissoes.index', $grupo->id)}}">Permissões de Acesso</a>
                </li>
            </ul>
        </div>
        <div class="mb-3 col-md-4">
            <label for="exampleFormControlInput1" class="form-label">Grupo:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="nome" value="{{ $grupo->nome }}">
        </div>

        <div class="form2">

            <div class="form-group form-group-sm">
                <label class="control-label col-sm-2" for="form_id">Formulário:</label>
                <div class="col-sm-8">
                    <select class="form-select" aria-label="Default select example" name="form_id">
                        <option selected>Selecione</option>
                        @foreach($forms as $form)
                            @if ($form->id == $formgrupo->form_id)
                                <option value="{{$form->id}}" selected>{{$form->nome}}</option>
                            @else 
                                <option value="{{$form->id}}" selected>{{$form->nome}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-2" for="inclui">Permissões:</label>
                    <div class="col-sm-2">
                        @if ($formgrupo->inclui == 1)
                            <input type="checkbox" name="inclui" checked> Inclui 
                        @else 
                            <input type="checkbox" name="inclui"> Inclui 
                        @endif 
                    </div>
                </div>
    
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-2" for="altera"></label>
                    <div class="col-sm-2">
                        @if ($formgrupo->altera == 1)
                            <input type="checkbox" name="altera" checked> Altera
                        @else 
                            <input type="checkbox" name="altera"> Altera  
                        @endif 
                    </div>
                </div>
    
                <div class="form-group form-group-sm">
                    <label class="control-label col-sm-2" for="exclui"></label>
                    <div class="col-sm-2">
                        @if ($formgrupo->exclui == 1)
                            <input type="checkbox" name="exclui" checked> Exclui 
                        @else 
                            <input type="checkbox" name="exclui"> Exclui 
                        @endif 
                    </div>
                </div>
    
                @can('formgrupos', 'altera')
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                @endcan
    
            </div>

        </div>


       
    </form>

    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-warning">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif 
    
<br><br><br>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Formulario</th>
            <th scope="col">INCLUI</th>
            <th scope="col">ALTERA</th>
            <th scope="col">EXCLUI</th>
            <th width="100">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach($permissoes as $permissao)
            <tr>
                <td>{{ $permissao->form['nome']}}</td>
                
                @if($permissao->inclui==1)
                    <td>
                        <input type="checkbox" checked id="inc">
                    </td>
                @else 
                    <td>
                        <input type="checkbox" id="inc">
                    </td>
                @endif 
                
                @if($permissao->altera==1)
                    <td>
                        <input type="checkbox" checked id="alt">
                    </td>
                @else 
                    <td>
                        <input type="checkbox" id="alt">
                    </td>
                @endif 

                @if($permissao->exclui==1)
                    <td>
                        <input type="checkbox" checked id="exc">
                    </td>
                @else 
                    <td>
                        <input type="checkbox" id="exc">
                    </td>
                @endif 

                <td width="100"> 
                
                    <a href="{{ route('permissoes.edit', $permissao->id)}}" class="btn btn-primary btn-sm">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                
                    <a href="{{ route('permissoes.destroy', $permissao->id)}}" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash3"></i>
                    </a>
                </td>
                
            </tr>
          @endforeach
        </tbody>
      </table>

    
</div>
    
@endsection