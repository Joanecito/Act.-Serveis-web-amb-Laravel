<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proveidors;

class ProveidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveidor = Proveidors::all();
        if (count($proveidor) == 0) {
            return response()->json([
                'success' => false,
                'message' => 'No proveidors'
            ], 200);
        }
        return response()->json([
            'success' => true,
            'data' => $proveidor->toArray()
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|max:50',
            'direccion' => 'required|max:50',
            'poblacion' => 'required|max:50',
            'cif' => 'required|max:50'
        ]);
        $proveidor = Proveidors::create([
            'nombre' => $validated['nombre'],
            'direccion' => $validated['direccion'],
            'poblacion' => $validated['poblacion'],
            'cif' => $validated['cif']
        ]);
        if ($proveidor->save()) {
            return response()->json([
                'success' => true,
                'data' => 'Proveidor saved'
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveidor = Proveidors::where('id', $id)->get();
        
        return response()->json([
            'success' => true,
            'data' => $proveidor->toArray()
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proveidor = Proveidors::find($id);

        $validated = $request->validate([
            'nombre' => 'required|max:50',
            'direccion' => 'required|max:50',
            'poblacion' => 'required|max:50',
            'cif' => 'required|max:50'
        ]);
        $proveidor->nombre = $validated['nombre'];
        $proveidor->direccion = $validated['direccion'];
        $proveidor->poblacion = $validated['poblacion'];
        $proveidor->cif = $validated['cif'];

        return response()->json([
            'success' => true,
            'data' => 'Proveidor updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveidor = Proveidors::where('id', $id)->delete();

        return response()->json([
            'success' => true,
            'data' => 'Proveidor deleted'
        ], 200);
    }
}
