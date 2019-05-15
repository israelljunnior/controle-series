<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
    public function index(Request $request) {

        $series = Serie::query()->orderBy('nome')->get();

        $mensagem = ($request->session()->get('mensagem'));

        return view('series.index', compact('series' , 'mensagem'));

    }

    public function create() {

        return view('series.create');

    } 

    public function store(SeriesFormRequest $request) {

        $serie = Serie::create($request->all());

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
