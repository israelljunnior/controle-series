@extends('layout')

@section('cabecalho')
    Séries
@endsection

@section('conteudo')
    @if (!empty($mensagem))
        <div class="alert alert-success">
            {{$mensagem}}
        </div>
    @endif
   
    <a href="{{ route('criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>
    <a href="{{ route('criar_categorias') }}" class="btn btn-dark mb-2">Adicionar Categoria</a>

    <ul class="list-group">
        @foreach($series as $serie)
        <li class="list-group-item d-flex justify-content-between">{{$serie->nome}}<small>{{$serie->categoriasNome}}</small>
            
            <form method="POST" action="/series/{{$serie->id}}"
            onsubmit="return confirm('Tem certeza que deseja excluir a serie {{$serie->nome}}?')">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger btn-sm">
                    <i class="far fa-trash-alt"></i>
                </button>
            </form>

        </li>      
        @endforeach
    </ul>
@endsection