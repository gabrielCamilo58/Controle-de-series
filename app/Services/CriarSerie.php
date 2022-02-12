<?php

namespace App\Services;

use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class CriarSerie
{
    public function criar(string $nome, int $qtdTemporada, int $qtdEpisodio, ?string $capa): Serie
    {
        $series = Serie::create(['nome' => $nome, 'capa' => $capa]);

        DB::beginTransaction(); //vai inciar uma transação.
        $this->criaTemporadas($series, $qtdTemporada, $qtdEpisodio);
        DB::commit();

        return $series;
    }

    private function criaTemporadas(Serie $series, int $qtdTemporada, int $qtdEpisodio)
    {
        for($i=1; $i<=$qtdTemporada; $i++){
            $temporada = $series->temporadas()->create(['numero' => $i]);
            $this->criaEpisodios($temporada, $qtdEpisodio);
        }
    }

    private function criaEpisodios( $temporada,  $qtdEpisodio)
    {
        for($j=1; $j<=$qtdEpisodio; $j++){
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}