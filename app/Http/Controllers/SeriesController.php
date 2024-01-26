<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;


class SeriesController extends Controller {
    public function index(Request $request){

        // $series = [
        //     "Friends",
        //     "The Vampire Diaries",
        //     "Game Of Thrones",
        //     "Lost"
        // ];

    //    $series = \DB::select('SELECT nome FROM series;');
    //    $series = Serie::all();
       $series = Serie::query()->orderBy('nome')->get();


  ;

        return view('series.index', compact('series'));

    }

    public function create(Request $request){
        return view('series.create');
    }

    public function store(Request $request){
        $nomeSerie = $request->input('nome');


    //   \DB::insert('INSERT INTO series (nome) VALUES (?)',[$nomeSerie]);


      $serie = new Serie();
      $serie->nome = $nomeSerie;
      $serie->save();



      return redirect('/series');
    }
}


