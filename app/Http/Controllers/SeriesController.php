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



      $serie = Serie::create($request->all());
    //   Serie::create($request->except(['_token']));
    // Serie::create($request->only(['nome']));

       $request ->session()->flash('mensagem.sucesso', "Série {$serie->nome} adicionada com sucesso!");

      return redirect('/series');
    }




    public function destroy(Request $request){


        Serie::destroy($request->serie);

        $request->session()->flash('mensagem.sucesso','Série removida com sucesso');


        return redirect('/series');
    }

    public function edit(Serie $serie){




        return view('series.edit', compact('serie'));
    }

    public function update(Request $request, $id){

        // dd($id);

        Serie::where('id', $id)->update([
            'nome' => $request->nome,

        ]);

        return redirect('/series');


    }
}


