<?php
namespace App\Http\Controllers;
use App\Veiculo;
use Illuminate\Http\Request;
class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $veiculos = Veiculo::all();
        return view('filme.index', compact('veiculos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('veiculo.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'modelo' => 'required|max:255',
            'fabricante' => 'required|max:15',
            'placa' => 'required|max:30',
        ]);
        // dd($validatedData);
        Veiculo::create($validatedData);
        return redirect(route('veiculo.index'))->with('success', 'Vehicle is successfully saved');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Veiculo  $veiculos
     * @return \Illuminate\Http\Response
     */
    public function show(Veiculo $veiculos)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Veiculo $veiculo)
    {
        return view('veiculo.edit', compact('veiculo'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Veiculo  $veiculos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        $validatedData = $request->validate([
            'modelo' => 'required|max:255',
            'fabricante' => 'required|max:15',
            'placa' => 'required|max:30',
            ]);
            
        $veiculo->update($validatedData);
        return redirect(route('veiculo.index'))->with('success', 'Vehicle is successfully saved');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Veiculo  $veiculos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veiculo $veiculo)
    {
        $veiculo = Veiculo::findOrFail($veiculo->id);
        $veiculo->delete();
        return redirect(route('veiculo.index'))->with('success', 'Vehicle is successfully deleted');
    }
}