<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tipodocumento;
use App\Http\Requests\Admin\TipodocumentoFormRequest;

class TipoDocumentoController extends Controller
{
    private $tipodocumento;

    public function __construct(Tipodocumento $tipodocumento)
    {
        $this->tipodocumento = $tipodocumento;
    }

    public function index()
    {
        $tipodocumentos = $this->tipodocumento 
            ->orderBy('nome', 'ASC')
            ->paginate(5);
        
        return view('admin.tipodocumento.index', ['tipodocumentos' => $tipodocumentos]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tipodocumento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipodocumentoFormRequest $request)
    {
        $dataForm = $request->all();

        // vai inserir
        $insert = $this->tipodocumento->insert([
            'nome' => $dataForm['nome']
        ]);

       // dd($insert);

        if($insert)
            return redirect()
                ->route('tipoDocumentos.index')
                ->with(['success' => 'Registro cadastrado com sucesso!'])
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $tipodocumentos = $this->tipodocumento 
            ->where('nome', 'LIKE', $nome)
            ->orderBy('nome', 'ASC')
            ->paginate(2);

        return view('admin.tipodocumento.index', ['tipodocumentos' => $tipodocumentos, 'dataForm'=> $dataForm]);
    }


}
