<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Prestamo::with(['lector', 'detalles.libro'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Crear un nuevo préstamo
        $prestamo = Prestamo::create([
            'fecha' => $request->fecha,
            'lector_id' => $request->lector_id,
            'fecha_devolucion' => $request->fecha_devolucion,
        ]);

        // Asociar los libros al préstamo
        $prestamo->detalles()->createMany(
            array_map(fn($libro_id) => ['libro_id' => $libro_id], $request->libros)
        );

        return response()->json($prestamo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestamo $prestamo)
    {
        return response()->json([
            'prestamo' => $prestamo,
            'detalles' => $prestamo->detalles()->with('libro')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        // Actualizar el préstamo
        $prestamo->update([
            'fecha' => $request->fecha,
            'lector_id' => $request->lector_id,
            'fecha_devolucion' => $request->fecha_devolucion,
        ]);

        // Eliminar los detalles antiguos
        $prestamo->detalles()->delete();

        // Asociar los nuevos libros al préstamo
        $prestamo->detalles()->createMany(
            array_map(fn($libro_id) => ['libro_id' => $libro_id], $request->libros)
        );

        return response()->json($prestamo, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        // Eliminar el préstamo y los detalles asociados
        $prestamo->detalles()->delete();
        $prestamo->delete();

        return response()->json(null, 204);  // Retorna una respuesta de "No Content"
    }
}
