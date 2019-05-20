<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use DB;

class SeriesController extends Controller
{
    public function index(Request $request) {

        $series = Serie::query()->
            join('categorias', 'series.categorias_id', '=', 'categorias.id')->
            select('series.nome', 'series.id', 'categorias.nome as categoriasNome')->
            orderBy('series.nome')->get();

        $mensagem = ($request->session()->get('mensagem'));

        return view('series.index', compact('series' , 'mensagem'));

    }

    public function create() {

        $categorias = Categoria::query()->orderBy('nome')->get();

        return view('series.create', compact('categorias'));

    } 

    public function store(SeriesFormRequest $request) {

        $serie = new Serie;

        $serie->categorias_id = $request->get('categorias_id');
        $serie->nome = $request->get('nome');
        $serie->save();
        $request->session()->flash(
            'mensagem', "Série {$serie->nome} Adicionada com Sucesso"
        );

        return redirect()->route('listar_series');

    }

    public function destroy(Request $request) {

        Serie::destroy($request->id);

        $request->session()->flash(
            'mensagem', "Série Deletada com Sucesso"
        );

        return redirect()->route('listar_series');

    }
}
