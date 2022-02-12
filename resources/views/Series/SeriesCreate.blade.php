@extends('Layout')
@section('cabecalho')
Adicionar Serie
@endsection

@section('conteudo')
@include('SubViews.erros', ['errors' => $errors])

<form action="/series/criar" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col col-8">
            <label for="nome">Nome</label>
            <input type="text" id="nome" class="form-control" name="nome">
        </div>
        <div class="col col-2">
            <label for="temporada">N° Temporadas</label>
            <input type="number" id="temporada" class="form-control" name="qtd_temporada">
        </div>
        <div class="col col-2">
            <label for="episodio">N° Episodios</label>
            <input type="number" id="episodio" class="form-control" name="qtd_episodio">
        </div>
    </div>
    <div class="row">
        <div class="col col-12">
            <label for="capa">Capa</label>
            <input type="file" id="capa" class="form-control" name="capa">
        </div>

    </div>
    <button class="btn btn-primary mt-2">Adicionar</button>
</form>
@endsection