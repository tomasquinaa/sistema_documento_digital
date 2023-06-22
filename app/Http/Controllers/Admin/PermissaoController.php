<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PermissaoFormRequest;
use App\Models\Formulario;
use Illuminate\Http\Request;
use App\Models\Grupousuario;
use App\Models\Formulariogrupo;
use Illuminate\Support\Facades\DB;

class PermissaoController extends Controller
{
    private $grupo;
    public function __construct(Grupousuario $grupo, Formulariogrupo $formgrupo, Formulario $form)
    {
        $this->grupo = $grupo;
        $this->formgrupo = $formgrupo;
        $this->form = $form;
    }

    public function index($id)
    {
        $grupo = $this->grupo->find($id);
       # $forms = $this->form 
               # ->orderBy('nome', 'ASC')->get();
        
        $sql = "SELECT formulario.id, nome FROM formulario ";
        $sql = $sql . "where id not in ";
        $sql = $sql . "( ";
        $sql = $sql . " select form_id from formulariogrupo ";
        $sql = $sql . " inner join formulario ";
        $sql = $sql . " on formulariogrupo.form_id = formulario.id ";
        $sql = $sql . " where grupo_id = '$id' ";
        $sql = $sql . " ) ";
        $sql = $sql . " order by formulario.nome";
        $forms = DB::select($sql);

        $permissoes = $this->formgrupo
            ->Where('grupo_id', '=', $id)
            ->get();

        return view('admin.formgrupo.index', [
            'grupo' => $grupo,
            'forms' => $forms,
            'permissoes' => $permissoes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissaoFormRequest $request, $id)
    {
        $dataForm = $request->all();
        if ( isset($dataForm['inclui']) )
            $dataForm['inclui'] = 1;
        else 
            $dataForm['inclui'] = 0;
        
        if ( isset($dataForm['altera']) )
            $dataForm['altera'] = 1;
        else 
            $dataForm['altera'] = 0;

        if ( isset($dataForm['exclui']) )
            $dataForm['exclui'] = 1;
        else 
            $dataForm['exclui'] = 0;

        $insert = $this->formgrupo->insert([
            'grupo_id' => $id,
            'form_id' => $dataForm['form_id'],
            'inclui' => $dataForm['inclui'],
            'altera' => $dataForm['altera'],
            'exclui' => $dataForm['exclui']
        ]);
        if ( $insert )
            return redirect()
                ->route('permissoes.index', $id);
        else 
            return redirect()
                ->route('permissoes.index', $id)
                ->withErrors(['errors' => 'Erro no Insert'])
                ->withInput();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formgrupo = $this->formgrupo->find($id);
        $grupo_id = $formgrupo->grupo_id;
        $form_id = $formgrupo->form_id;
        $grupo = $this->grupo->find($grupo_id);
        $forms = $this->form 
                ->where('id', '=', $form_id)
                ->orderBy('nome', 'ASC')->get();

        $permissoes = $this->formgrupo 
            ->where('grupo_id', '=', $grupo_id)
            ->get();

        return view('admin.formgrupo.edit', [
            'formgrupo' => $formgrupo,
            'grupo' => $grupo,
            'forms' => $forms,
            'permissoes' => $permissoes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissaoFormRequest $request, $id)
    {
        $formgrupo = $this->formgrupo->find($id);
        $dataForm = $request->all();
        if (isset($dataForm['inclui']) == 'on')
            $dataForm['inclui'] = 1;
        else 
            $dataForm['inclui'] = 0;
        
        if (isset($dataForm['altera']) == 'on')
            $dataForm['altera'] = 1;
        else 
            $dataForm['altera'] = 0;
        
        if (isset($dataForm['exclui']) == 'on')
            $dataForm['exclui'] = 1;
        else 
            $dataForm['exclui'] = 0;


        $update = $formgrupo->update($dataForm);
        if ($update)
            return redirect()
                ->route('permissoes.edit', $id)
                ->with(['success' => 'Registro alterado com sucesso'])
                ->withInput();
        else 
            return redirect()
                ->route('permissoes.edit', $id)
                ->withErrors(['errors' => 'Erro no Update'])
                ->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $formgrupo =  $this->formgrupo->find($id);
        $grupo_id = $formgrupo->grupo_id;
        $delete = $formgrupo->delete();
        if ($delete)
            return redirect()
                ->route('permissoes.index', $grupo_id)
                ->withInput();
        else 
            return redirect()
                ->route('permissoes.index', $grupo_id)
                ->withErrors(['errors' => 'Erro no Delete'])
                ->withInput();
    }
}
