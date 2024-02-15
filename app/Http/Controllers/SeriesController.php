<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Episodio;
use App\Models\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\Autenticador;
use App\Repositories\SerieRepository;



class SeriesController extends Controller {


 public function __construct(private SerieRepository $repository){
   $this->middleware(Autenticador::class)->except('index');
 }






    public function index(Request $request){



         $series = $this->repository->list();

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

    $serie = $this->repository->add($request);

    //   Serie::create($request->except(['_token']));
    // Serie::create($request->only(['nome']));

       $request ->session()->flash('mensagem.sucesso', "Série {$serie->nome} adicionada com sucesso!");

      return redirect('/series');
    }


    public function destroy(Serie $series){

        $this->repository->delete($series);

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }

    public function edit( Serie $series){

       return view('series.edit')->with('serie', $series);
    }

    public function update(Serie $series, Request $request){


        $this->repository->edit( $request,$series);

        $request->session()->flash('mensagem.sucesso','Série editada com sucesso');

        return redirect('/series');



    }
}


