<?php

namespace App\Http\Controllers;
use App\Locacao;
use App\Cliente;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($cliente_id)
    {
        $locacao = Cliente::find($cliente_id)->locacoes()->get();;
        return view('locacao.index', compact('locacao'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('locacao.create' , compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
         
        //dd($request);
        $cliente = Cliente::findOrFail($id);
        $validatedData = $request->validate([
            'dataLocacao' => 'required|max:255',
            'dataEntrega' => 'required|max:255',
            'valor' => 'required|max:15'
        ]);
        
        $locacao = new Locacao;
        
        //$pedido = $validatedData;
        $locacao->cliente_id = $id;
        $locacao->data = $request->input('data');
        $locacao->valor = $request->input('valor');
        $locacao->save();
        $cliente->locacoes->push($locacao);
        $cliente->save();
        //Pessoa::whereId($pessoa->id)->update($validatedData);
        return redirect(route('cliente.index'))->with('success', 'is successfully saved');
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
     * @param  \App\Locacao  $locacao
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit($cliente_id, Locacao $locacao)
    {
        return view('locacao.edit', compact('cliente_id', 'locacao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locacao  $locacao
     * @return \Illuminate\Http\Response
     */
    public function update($cliente_id, Request $request, Locacao $locacao)
    {
        $validatedData = $request->validate([
            'dataLocacao' => 'required|max:255',
            'dataEntrega' => 'required|max:255',
            'valor' => 'required|max:15',
        ]);
        // dd($validatedData);
        //locacao::update($validatedData);
        $locacao->data = $request->input('data');
        $locacao->valor = $request->input('valor');
        $locacao->save();
        return redirect(route('cliente.locacao.index', $cliente_id))->with('success', 'Rent is successfully saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locacao  $locacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente_id, Locacao $locacao)
    {
        // $locacao = locacao::findOrFail($locacao->id);
        $locacao->delete();
        return redirect(route('cliente.locacao.index', $cliente_id))->with('success', 'Rent is successfully deleted');
    }
}
