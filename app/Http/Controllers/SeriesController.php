<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Temporada;
use App\Models\Episodio;
use Illuminate\Support\Facades\DB;


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

    //    $mensagemSucesso = $request->session()->get('mensagem.sucesso');
          $mensagemSucesso = session('mensagem.sucesso');

    //    $request->session()->forget('mensagem.sucesso');


        return view('series.index', compact('series'), compact('mensagemSucesso'));

    }

    public function create(Request $request){
        return view('series.create');
    }

    public function store(Request $request){
        // $nomeSerie = $request->input('nome');
    //   \DB::insert('INSERT INTO series (nome) VALUES (?)',[$nomeSerie]);
    //   $serie = new Serie();
    //   $serie->nome = $nomeSerie;

    //   $serie->save();


    $request->validate([
        'nome' => ['required', 'min:3']
      ]);

      $serie = null;

      DB::transaction(function () use ($request, &$serie){
        $serie = Serie::create($request->all());


        for($i = 1; $i <= $request->temporadas; $i++) {
          $temporada = $serie->temporadas()->create([
            'numero'=>$i
          ]);


          for($j=1; $j <= $request->episodios; $j++)
          $temporada->episodios()->create([
                  'numero' => $j
          ]);
        }

      });





    //   Serie::create($request->except(['_token']));
    // Serie::create($request->only(['nome']));

       $request ->session()->flash('mensagem.sucesso', "Série {$serie->nome} adicionada com sucesso!");

      return redirect('/series');
    }




    public function destroy(Serie $series){



        $series->delete();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }


    public function edit( Serie $series){

       return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, Request $request){


        // dd(json_decode($serie)->id);
        Serie::where('id', $series->id)->update([
            'nome' => $request->nome,

        ]);

        $request->session()->flash('mensagem.sucesso','Série editada com sucesso');

        return redirect('/series');



    }
}


