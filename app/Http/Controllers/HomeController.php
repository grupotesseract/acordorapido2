<?php

/*
 * Desenvolvedores:
 * Fernando Fernandes
 * Evandro Carreira
 * Renato Gomes
 *
 */

namespace App\Http\Controllers;

use Auth;
use App\Models\Aviso as Aviso;
use App\Models\Titulo as Titulo;
use App\Models\Importacao as Importacao;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $u = Auth::user();
        if ($u->hasRole('aluno')) {
            $cliente = $u->cliente;
            if (! $cliente) {
                dd('aluno não encontrado');
            }
            $titulos = Titulo::where('cliente_id', $cliente->id)->take(10);
            $totalAzuis = $titulos->azuis()->count();
            $totalVerdes = $titulos->verdes()->count();
            $totalAmarelos = $titulos->amarelos()->count();
            $totalVermelhos = $titulos->vermelhos()->count();
            $avisos = Aviso::where('cliente_id', $cliente->id);
        }
        if ($u->hasRole('escola')) {
            $empresa = $u->empresa;
            if (! $empresa) {
                dd('empresa não encontrado');
            }
            $titulos = Titulo::where('empresa_id', $empresa->id)->take(10);
            $totalAzuis = $titulos->azuis()->count();
            $totalVerdes = $titulos->verdes()->count();
            $totalAmarelos = $titulos->amarelos()->count();
            $totalVermelhos = $titulos->vermelhos()->count();

            $avisos = Aviso::where('empresa_id', $empresa->id);
            $importacoes = Importacao::where('empresa_id', $empresa->id);
        }

        $titulos = Titulo::all()->take(10);
        // TODO filtrar por escola/cliente que o usuario pode ver
        $avisos = Aviso::all();
        $importacoes = Importacao::orderBy('id', 'desc')->take(5)->get();
        $totalAzuis = Titulo::azuis()->count();
        $totalVerdes = Titulo::verdes()->count();
        $totalAmarelos = Titulo::amarelos()->count();
        $totalVermelhos = Titulo::vermelhos()->count();

        return view('home')->with([
            'avisos' => $avisos,
            'titulos' => $titulos,
            'importacoes' => $importacoes,
            'totalAzuis' => $totalAzuis,
            'totalVerdes' => $totalVerdes,
            'totalAmarelos' => $totalAmarelos,
            'totalVermelhos' => $totalVermelhos,
        ]);
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $u = Auth::user();
        if ($u->hasRole('aluno')) {
            $cliente = $u->cliente;
            if (! $cliente) {
                dd('aluno não encontrado');
            }
            $titulos = Titulo::where('cliente_id', $cliente->id)->take(10);
            $totalAzuis = $titulos->azuis()->count();
            $totalVerdes = $titulos->verdes()->count();
            $totalAmarelos = $titulos->amarelos()->count();
            $totalVermelhos = $titulos->vermelhos()->count();
            $avisos = Aviso::where('cliente_id', $cliente->id);
        }
        if ($u->hasRole('escola')) {
            $empresa = $u->empresa;
            if (! $empresa) {
                dd('empresa não encontrado');
            }
            $titulos = Titulo::where('empresa_id', $empresa->id)->take(10);
            $totalAzuis = $titulos->azuis()->count();
            $totalVerdes = $titulos->verdes()->count();
            $totalAmarelos = $titulos->amarelos()->count();
            $totalVermelhos = $titulos->vermelhos()->count();

            $avisos = Aviso::where('empresa_id', $empresa->id);
            $importacoes = Importacao::where('empresa_id', $empresa->id);
        }
        if ($u->hasRole('admin')) {
            $titulos = Titulo::all()->take(10);
            $avisos = Aviso::all();
            $importacoes = Importacao::orderBy('id', 'desc')->take(5)->get();
            $totalAzuis = Titulo::azuis()->count();
            $totalVerdes = Titulo::verdes()->count();
            $totalAmarelos = Titulo::amarelos()->count();
            $totalVermelhos = Titulo::vermelhos()->count();
        }

        return view('dashboard')->with([
            'avisos' => $avisos,
            'titulos' => $titulos,
            'importacoes' => $importacoes,
            'totalAzuis' => $totalAzuis,
            'totalVerdes' => $totalVerdes,
            'totalAmarelos' => $totalAmarelos,
            'totalVermelhos' => $totalVermelhos,
        ]);
    }
}
