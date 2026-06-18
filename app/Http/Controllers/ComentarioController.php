<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function criaComentario(Request $request)
    {
        Comentario::create([
            'texto'       => $request->texto,
            'autor'       => $request->autor,
            'postagem_id' => $request->postagem_id,
        ]);

        return redirect()->route('home');
    }
}