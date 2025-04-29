<?php

namespace App\Http\Controllers;

use App\Models\Lector;
use Illuminate\Http\Request;

class LectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // lista de lectors para mostrar desde el api
        $lectores = Lector::all();
        return response()->json($lectores, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $lector = Lector::create($input);
        return response()->json($lector, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lector $lector)
    {
        return response()->json($lector);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lector $lector)
    {
        $input = $request->all();
        $lector->update($input);
        return response()->json($lector, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lector $lector)
    {
        $lector->delete();
        return response()->json(null, 204);
    }
}
