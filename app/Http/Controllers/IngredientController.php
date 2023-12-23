<?php
// app/Http/Controllers/IngredientController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return view('admin.ingredients.index', compact('ingredients'));
    }

    public function create()
    {
        return view('admin.ingredients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ingredients',
            // Добавьте другие необходимые поля для валидации
        ]);

        Ingredient::create([
            'name' => $request->input('name'),
            // Добавьте другие необходимые поля
        ]);

        return redirect()->route('admin.ingredients.index')->with('success', 'Ингредиент успешно создан.');
    }

    public function show($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('admin.ingredients.show', compact('ingredient'));
    }

    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('admin.ingredients.edit', compact('ingredient'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:ingredients,name,' . $id,
            // Добавьте другие необходимые поля для валидации
        ]);

        $ingredient = Ingredient::findOrFail($id);
        $ingredient->update([
            'name' => $request->input('name'),
            // Добавьте другие необходимые поля
        ]);

        return redirect()->route('admin.ingredients.index')->with('success', 'Ингредиент успешно обновлен.');
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();

        return redirect()->route('admin.ingredients.index')->with('success', 'Ингредиент успешно удален.');
    }
}