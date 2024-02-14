<?php

namespace App\Http\Controllers;
use App\Models\Serie;
use Illuminate\Http\Request;
use App\Repositories\TemporadaRepository;


class TemporadasController extends Controller
{


    public function index(Serie $serie, TemporadaRepository $repository ){
        $temporadas = $repository->list($serie);

        return view('temporadas.index')->with('temporadas', $temporadas)->with('serie', $serie);
    }




}
