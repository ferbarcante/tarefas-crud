<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(){
        return view('categorias.index');
    }

    public function create(){
        return view('categorias.create');
    }

    public function store(Request $request){
        $data = $request -> validate ([
            'nome' => 'required'
        ]);

        $novaCategoria = Categoria::create($data);

        return redirect(route('categorias.index'));
    }
}


