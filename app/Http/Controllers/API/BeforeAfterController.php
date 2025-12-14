<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BeforeAfter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeforeAfterController extends Controller
{
    // GET - obtener todos
    public function index()
    {
        return response()->json(
            BeforeAfter::select(
                'id',
                'before_image',
                'after_image',
                'description',
                'created_at'
            )->get()
        );
    }

    // POST - crear contenido con imágenes
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'before_image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'after_image' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);

        $beforePath = $request->file('before_image')
            ->store('before-after', 'public');

        $afterPath = $request->file('after_image')
            ->store('before-after', 'public');

        $beforeAfter = BeforeAfter::create([
            'title' => $request->title,
            'description' => $request->description,
            'before_image' => $beforePath,
            'after_image' => $afterPath,
            'user_id' => auth()->id(),
        ]);

        return response()->json($beforeAfter, 201);
    }

    //UPDATE - moficar contendio
    public function update(Request $request, $id)
    {
        $item = BeforeAfter::findOrFail($id);

    // 1. Validación flexible (nada obligatorio)
        $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'before_image' => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:4096',
            'after_image' => 'sometimes|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);
    // 2. Campos de texto
        if ($request->has('title')) {
            $item->title = $request->title;
        }
        if ($request->has('description')) {
            $item->description = $request->description;
        }
    // 3. Reemplazar imagen BEFORE
        if ($request->hasFile('before_image')) {
            Storage::disk('public')->delete($item->before_image);
            $item->before_image = $request
                ->file('before_image')
                ->store('before-after', 'public');
        }
    // 4. Reemplazar imagen AFTER
        if ($request->hasFile('after_image')) {
            Storage::disk('public')->delete($item->after_image);
            $item->after_image = $request
                ->file('after_image')
                ->store('before-after', 'public');
        }
    // 5. Guardar cambios
        $item->save();
        return response()->json([
            'message' => 'Contenido actualizado correctamente',
            'data' => $item
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        $item = BeforeAfter::findOrFail($id);

        Storage::disk('public')->delete([
            $item->before_image,
            $item->after_image,
        ]);

        $item->delete();

        return response()->json([
            'message' => 'Contenido eliminado'
        ]);
    }
}
