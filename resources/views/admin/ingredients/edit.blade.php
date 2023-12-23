<!-- resources/views/admin/ingredients/edit.blade.php -->
@extends('layout.admin')

@section('content')
    <h3 class="text-gray-700 text-3xl font-medium">Редактировать ингредиент</h3>

    <!-- Форма для редактирования ингредиента -->
    <form action="{{ route('admin.ingredients.update', $ingredient->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Название ингредиента:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $ingredient->name) }}" class="border-2 border-gray-300 p-2 w-full" required>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Сохранить изменения</button>
        </div>
    </form>
@endsection
