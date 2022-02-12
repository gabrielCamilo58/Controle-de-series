<?php

namespace App\Http\Controllers;

use App\Events\NovaSerie;
use App\Http\Requests\seriesFormRequest;
use App\Mail\MailNovaSerie;
use App\Models\Serie;
use App\Models\User;
use App\Services\CriarSerie;
use App\Services\EnviaEmail;
use App\Services\RemoverSerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SeriesController extends Controller
{
    
    
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get("menssagem");
        return view('Series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('Series.SeriesCreate');
    }
    public function store(seriesFormRequest $request, CriarSerie $criadorDeSerie)
    {
        $capa = null;

        if($request->hasFile('capa')) $capa = $request->file('capa')->store('public/serie');
        
        $series = $criadorDeSerie->criar($request->nome, $request->qtd_temporada, $request->qtd_episodio, $capa);
        event(new NovaSerie($request->nome, $request->qtd_temporada, $request->qtd_episodio));

        $request->session()->flash('menssagem', "Serie {$series->nome}, suas temporadas e episodios foram criados com sucesso");

        return redirect()->route('listar_series');
    }
    public function destroy(Request $request, RemoverSerie $removerSerie)
    {
        $nomeSerie = $removerSerie->remover($request->id);

        $request->session()->flash('menssagem', "serie {$nomeSerie} excluida com sucesso");
        return redirect()->route('listar_series');
    }

    public function editaNome($id, Request $request)
    {
        $novoNome = $request->nome;
        $serie = Serie::find($id);
        $serie->nome = $novoNome;
        $serie->save();
    }
}
