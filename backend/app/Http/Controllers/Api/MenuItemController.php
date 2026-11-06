<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * GET /api/menu-items
     * Listar todos los elementos del menú.
     */
    public function index()
    {
        $items = MenuItem::all();
        return response()->json([
            'success' => true,
            'data' => $items
        ], 200);
    }

    /**
     * POST /api/menu-items
     * Crear un nuevo elemento.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio'      => 'required|numeric|min:0',
            'categoria'   => 'required|string|max:100',
            'disponible'  => 'nullable|boolean',
        ]);

        $item = MenuItem::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Elemento del menú creado exitosamente.',
            'data' => $item
        ], 201);
    }

    /**
     * GET /api/menu-items/{id}
     * Obtener un elemento específico.
     */
    public function show($id)
    {
        $item = MenuItem::find($id);

        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Elemento del menú no encontrado.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $item
        ], 200);
    }

    /**
     * PUT/PATCH /api/menu-items/{id}
     * Actualizar un elemento existente.
     */
    public function update(Request $request, $id)
    {
        $item = MenuItem::find($id);

        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Elemento del menú no encontrado.'
            ], 404);
        }

        $validated = $request->validate([
            'nombre'      => 'sometimes|required|string|max:255',
            'descripcion' => 'sometimes|required|string',
            'precio'      => 'sometimes|required|numeric|min:0',
            'categoria'   => 'sometimes|required|string|max:100',
            'disponible'  => 'sometimes|boolean',
        ]);

        $item->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Elemento del menú actualizado correctamente.',
            'data' => $item
        ], 200);
    }

    /**
     * DELETE /api/menu-items/{id}
     * Eliminar un elemento.
     */
    public function destroy($id)
    {
        $item = MenuItem::find($id);

        if (!$item) {
            return response()->json([
                'success' => false,
                'message' => 'Elemento del menú no encontrado.'
            ], 404);
        }

        $item->delete();

        return response()->json([
            'success' => true,
            'message' => 'Elemento eliminado del menú exitosamente.'
        ], 200);
    }

    /**
     * GET /api/menu-items/category/{category}
     * Filtrar elementos por categoría.
     */
    public function getByCategory($category)
    {
        $items = MenuItem::where('categoria', 'LIKE', $category)->get();

        return response()->json([
            'success' => true,
            'data' => $items
        ], 200);
    }
}