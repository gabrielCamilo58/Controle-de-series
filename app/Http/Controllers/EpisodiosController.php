<?php

namespace App\Http\Controllers;

use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index($temporadaId,Request $request)
    {
        
        $temporadas = Temporada::find($temporadaId);
        $episodios = $temporadas->episodios;

        $mensagem = $request->session()->get('mensagem');

        return view('Episodios.Episodios', compact('episodios', 'temporadaId', 'mensagem'));
    }

    public function assistir(Temporada $temporadas, Request $request)
    {
//Ao passar o Id da temporada pela rota e pegalo nos parametros da funçao como um objeto do tipo temporada o laravel ja nos entrega a temporada correta

        $episodiosAssistidos = $request->episodios;
        $temporadas->episodios->each(function (Episodio $episodio) use($episodiosAssistidos){
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });

        $temporadas->push();
        $request->session()->flash('mensagem', 'Episodios marcados como assistidos');

        return redirect()->back();
    }
}
