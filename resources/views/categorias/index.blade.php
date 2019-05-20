@extends('layout')

@section('cabecalho')
    Categorias
@endsection

@section('conteudo')
    @if (!empty($mensagem))
        <div class="alert alert-success">
            {{$mensagem}}
        </div>
    @endif
   
    <a href="{{ route('criar_categorias') }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach($categorias as $categoria)
        <li class="list-group-item d-flex justify-content-between">{{$categoria->nome}}
            <form method="POST" action="/categorias/{{$categoria->id}}"
            onsubmit="return confirm('Tem certeza que deseja excluir a Categoria {{$categoria->nome}}?')">
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