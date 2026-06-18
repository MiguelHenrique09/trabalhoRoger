<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{   
    
    public function index()
    {
        $categorias = Categoria::all();

        return view('categorias', compact('categorias'));
    }

public function EditaCategoria(Request $request, $id)
{
    $categoria = Categoria::findOrFail($id);
    $categoria->update($request->only('nome'));
    return redirect()->route('categorias');
}
public function CriaCategoria(Request $request)
{
    Categoria::create(['nome' => $request->nome]);
    return redirect()->route('categorias')->with('sucesso', 'Categoria criada com sucesso!');
}

    public function destroy($id)
    {
        $categoria = Categoria::find($id);

        $categoria->delete();

        return redirect('categorias');
    }
}