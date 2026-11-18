<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class EntrenadorController extends Controller
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
        $entrenadors = $this->fetchDataFromApi($url . '/entrenadors/list');

        return view('entrenadors.index', compact('entrenadors'));
    }

    public function show($id)
    {
        $url = env('URL_SERVER_API');

        $entrenadors = $this->fetchDataFromApi($url . '/entrenadors/' . $id);

        return view('entrenadors.show', compact('entrenadors'));
    }

     public function create()
    {
        return view('entrenadors.create');
    }

    public function salida(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'cedula' => 'required|integer',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $url = env('URL_SERVER_API');

        
        $file = $request->file('imagen');
        $response = Http::attach('imagen',file_get_contents($file->getRealPath()),$file->getClientOriginalName())
        ->post(env('URL_SERVER_API') . '/entrenadors/store',[
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'cedula' => $request->cedula,
            ]);
        return redirect()->route('entrenadors.index');

    }

    

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $entrenadors = $this->fetchDataFromApi($url . '/entrenadors/' . $id);
        return view('entrenadors.edit', compact('entrenadors'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/entrenadors/' . $id, $request->all());

        return redirect()->route('entrenadors.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/entrenadors/' . $id);
        return redirect()->route('entrenadors.index');
    }
}
