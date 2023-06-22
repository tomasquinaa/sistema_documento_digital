<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email;
use App\Http\Requests\Admin\SetorFormRequest;
use App\Models\Setor;

class SetorController extends Controller
{
    private $setor;
    public function __construct(Setor $setor)
    {
        $this->setor = $setor;
    }

    public function index()
    {
        $setores = $this->setor
                ->orderBy('nome', 'ASC')
                ->paginate(5);

        return view('admin.setor.index',['setores' => $setores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.setor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SetorFormRequest $request)
    {
        $dataForm = $request->all();

        // Vai inserir
        $insert = $this->setor->insert([
            'nome' => $dataForm['nome']
        ]);

        if($insert)
            return redirect()
            ->route('setores.index')
            ->with(['success' => 'Registro cadastrado com sucesso!'])
            ->withInput();
        else 
            return redirect()
                ->route('setores.create')
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
        $setor = $this->setor->find($id);
        return view('admin.setor.edit', ['setor' => $setor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SetorFormRequest $request, $id)
    {
        $setor = $this->setor->find($id);
        $dataForm = $request->all();
        $update = $setor->update($dataForm);
        if ($update)
            return redirect()
                  ->route('setores.index')
                  ->with(['success' => 'Registro Alterado com sucesso'])
                  ->withInput();
        else 
            return redirect()
                  ->route('setores.edit', $id)
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
        //
    }


    public function search(Request $request)
    {
        $dataForm = $request->all();
        $nome = '%' . $dataForm['nome'] . '%'; 
        $setores = $this->setor 
            ->where('nome', 'LIKE', $nome)
            ->orderBy('nome', 'ASC')
            ->paginate(2);

        return view('admin.setor.index', ['setores' => $setores, 'dataForm'=> $dataForm]);
    }

}
