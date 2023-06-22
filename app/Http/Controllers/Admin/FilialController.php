<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FilialFormRequest;
use Illuminate\Http\Request;
use App\Models\Filial;

class FilialController extends Controller
{
    private $filial;

    public function __construct(Filial $filial)
    {
        $this->filial = $filial;
    }

    public function index()
    {
        $filials = $this->filial
                ->orderBy('nome', 'ASC')
                ->paginate(5);
        
        return view('admin.filial.index', ['filials' => $filials]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.filial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilialFormRequest $request)
    {
        $dataForm = $request->all();

        // vai inserir
        $insert = $this->filial->insert([
            'nome' => $dataForm['nome']
        ]);


        if($insert)
            return redirect()
                ->route('filials.index')
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
        $filials = $this->filial 
            ->where('nome', 'LIKE', $nome)
            ->orderBy('nome', 'ASC')
            ->paginate(2);

        return view('admin.filial.index', ['filials' => $filials, 'dataForm'=> $dataForm]);
        
    }



}
