<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DisciplinaController extends Controller
{
    //
    // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json() ;
    }

    public function index()
    {
        $url = env('URL_SERVER_API');
        $disciplinas = $this->fetchDataFromApi($url . '/disciplinas/list');

        return view('disciplinas.index', compact('disciplinas'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $disciplinas = $this->fetchDataFromApi($url . '/disciplinas/' . $id);

        return view('disciplinas.show', compact('disciplinas'));
    }

     public function create()
    {
        return view('disciplinas.create');
    }

    public function salida(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/disciplinas/store', $request->all());

        return redirect()->route('disciplinas.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $disciplinas = $this->fetchDataFromApi($url . '/disciplinas/' . $id);
        return view('disciplinas.edit', compact('disciplinas'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/disciplinas/' . $id, $request->all());

        return redirect()->route('disciplinas.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/disciplinas/' . $id);
        return redirect()->route('disciplinas.index');
    }
}
