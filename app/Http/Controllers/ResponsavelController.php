<?php

namespace App\Http\Controllers;

use App\Models\Responsavel;
use Illuminate\Http\Request;

class ResponsavelController extends Controller
{
    //
    public function index(){
        return view('responsavel.index');
    }

    public function create(){
        return view('responsavel.create');
    }

    public function store(Request $request){
        $data = $request -> validate([
            'nome' => 'required'
        ]);

        $novoResponsavel = Responsavel::create($data);
        return redirect(route('responsavel.index'));
}
