<!-- resources/views/admin/ingredients/create.blade.php -->
@extends('layout.admin')

@section('content')
    <h3 class="text-gray-700 text-3xl font-medium">Добавить ингредиент</h3>

    <!-- Форма для создания нового ингредиента -->
    <form action="{{ route('admin.ingredients.store') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-medium mb-2">Название ингредиента:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="border-2 border-gray-300 p-2 w-full" required>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Добавить ингредиент</button>
        </div>
    </form>
@endsection
