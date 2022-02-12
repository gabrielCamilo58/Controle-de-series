<?php

namespace App\Services;

use App\Events\ApagarCapa;
use App\Models\Episodio;
use App\Models\Serie;
use App\Models\Temporada;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RemoverSerie
{
    public function remover(int $id): string
    {
        
    $nomeSerie = '';
        DB::transaction(function () use ($id, &$nomeSerie){
        $serie = Serie::find($id);
        $nomeSerie = $serie->nome;

        $this->removerTemporadas($serie);

        $serie->delete();

        event(new ApagarCapa($serie));

        });
    return $nomeSerie;
    }

    private function removerTemporadas($serie)
    {
        $serie->temporadas->each(function(Temporada $temporada){
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodios($temporada)
    {
        $temporada->episodios->each(function(Episodio $episodio){
            $episodio->delete();
        });
    }
}