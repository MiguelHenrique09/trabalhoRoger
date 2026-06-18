<?php

namespace App\Http\Controllers;

use App\Models\Postagem;
use Illuminate\Http\Request;
use App\Models\Categoria;

class PostagemController extends Controller
{



 public function index()
{
    $postagens = Postagem::with('categoria', 'comentarios')->get();
    $categorias = Categoria::all();
    return view('index', compact('postagens', 'categorias'));
}
   

public function CriaPostagem(Request $request)
{
    Postagem::create([
        'titulo'       => $request->titulo,
        'texto'        => $request->texto,
        'autor'        => $request->autor,
        'categoria_id' => $request->categoria_id,
    ]);

    return redirect()->route('home')->with('sucesso', 'Postagem criada com sucesso!');
}}