<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Livros;
use Illuminate\Auth\Events\Validated;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    public function criar(){
        
        return view('criar');
    }

    public function listar(){

        $livros = Livros::all();

        return view('listar',compact('livros'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'sinopse' => 'nullable|string|max:500',
            'data' => 'nullable|date',
        ]);

        Livros::create([
            'titulo' => $request->input('titulo'),
            'autor' => $request->input('autor'),
            'genero' => $request->input('genero'),
            'sinopse' => $request->input('sinopse'),
            'data' => $request->input('data'),
        ]);

        return redirect()->back()->with('success','Livro salvo com sucesso!');

    }

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $livro = Livros::findOrFail($id);
        return view('editar', compact('livro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'sinopse' => 'nullable|string|max:255',
            'data' => 'nullable|date',
        ]);

        $livro = Livros::findOrFail($id);

        $livro->titulo = $request->input('titulo');
        $livro->autor = $request->input('autor');
        $livro->genero = $request->input('genero');
        $livro->sinopse = $request->input('sinopse');
        $livro->data = $request->input('data');

        $livro->save();

        return redirect()->route('listar.index')->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $livro = Livros::findOrFail($id);
        $livro->delete();

        return redirect()->back()->with('success', 'Livro removido com sucesso!');
    }

    public function filtrar(Request $request)
    {
        $filtrar = $request->input('query');
        
       
        $results = Livros::where('titulo', 'LIKE', "%{$filtrar}%")->orWhere('autor', 'LIKE', "%{$filtrar}%")->orWhere('genero', 'LIKE', "%{$filtrar}%")->get();

                        
        return response()->json($results);

    }
}
