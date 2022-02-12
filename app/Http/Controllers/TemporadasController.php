<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index($id)
    {
        $serie = Serie::find($id);
        $temporadas = $serie->temporadas;
        

        return view('Temporadas.Temporadas', compact('serie', 'temporadas', ));

    }
}
