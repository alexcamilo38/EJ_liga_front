<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeportistaController extends Controller
{
    //
     // Método privado para manejar llamadas HTTP repetitivas
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index()
    {

        $url = env('URL_SERVER_API');
        $deportistas = $this->fetchDataFromApi($url . '/deportistas/list');

        return view('deportistas.index', compact('deportistas'));
    }

    public function show($id)
    {

        $url = env('URL_SERVER_API');
        $deportistas = $this->fetchDataFromApi($url . '/deportistas/' . $id);

        return view('deportistas.show', compact('deportistas'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $disciplinas = Http::get($url .'/disciplinas/list')->json();

        return view('deportistas.create',compact('disciplinas'));
    }

    public function salida(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'expediente' => 'required|string|max:255',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:5120',
            'disciplina_id' => 'required|integer|min:1',
        ]);

        $url = env('URL_SERVER_API');

        $file = $request->file('imagen');

        $response = Http::attach(
            'imagen',file_get_contents($file->getRealPath()),
            $file->getClientOriginalName())->post(env('URL_SERVER_API') . '/deportistas/store',[
            'nombre' => $request->nombre, 
            'apellido' => $request->apellido, 
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'expediente' => $request->expediente, 
            'disciplina_id' => $request->disciplina_id
            ]);

        return redirect()->route('deportistas.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $disciplinas = Http::get($url .'/disciplinas/list')->json();
        $deportistas = $this->fetchDataFromApi($url . '/deportistas/' . $id);

        return view('deportistas.edit', compact('deportistas','disciplinas'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/deportistas/' . $id, $request->all());

        return redirect()->route('deportistas.index');
    }

    public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/deportistas/' . $id);
        return redirect()->route('deportistas.index');
    }
}
