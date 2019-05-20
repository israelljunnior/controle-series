<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;


class CategoriasController extends Controller
{
    public function index(Request $request) {

       
        $categorias = Categoria::query()->orderBy('nome')->get();

        $mensagem = ($request->session()->get('mensagem'));

        return view('categorias.index', compact('categorias' , 'mensagem'));

    }

    public function create() {

        return view('categorias.create');

    }

    public function store(Request $request) {
        


        $categoria = Categoria::create($request->all());



        $request->session()->flash(
            'mensagem', "Categoría {$categoria->nome} Adicionada com Sucesso"
        );

        return redirect()->route('listar_categorias');

    }

    public function destroy(Request $request) {

        Categoria::destroy($request->id);

        $request->session()->flash(
            'mensagem', "Série Deletada com Sucesso"
        );

        return redirect()->route('listar_categorias');

    }

}
