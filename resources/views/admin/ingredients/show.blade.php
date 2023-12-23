@extends('layout.admin')

@section('content')
    <h3 class="text-gray-700 text-3xl font-medium">{{ $ingredient->name }}</h3>

    <div class="mt-4">
        <p class="text-gray-700">ID: {{ $ingredient->id }}</p>
        <p class="text-gray-700">Название: {{ $ingredient->name }}</p>
        {{-- Добавьте другие поля, которые вы хотите отобразить --}}
    </div>

    <div class="mt-8">
        <a href="{{ route('admin.ingredients.edit', $ingredient->id) }}" class="text-indigo-600 hover:text-indigo-900">Редактировать</a>

        <form action="{{ route('admin.ingredients.destroy', $ingredient->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900">Удалить</button>
        </form>
    </div>
@endsection
