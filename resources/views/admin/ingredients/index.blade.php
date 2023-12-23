<!-- resources/views/admin/ingredients/index.blade.php -->

@extends('layout.admin')

@section('title', 'Ингредиенты')

@section('content')
    <h3 class="text-gray-700 text-3xl font-medium">Ингредиенты</h3>

    <div class="mt-8">
        <a href="{{ route('admin.ingredients.create') }}" class="text-indigo-600 hover:text-indigo-900">Добавить ингредиент</a>
    </div>

    <div class="flex flex-col mt-8">
        <!-- Таблица для отображения списка ингредиентов -->
        @if ($ingredients->count() > 0)
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Название</th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @foreach ($ingredients as $ingredient)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                <div class="text-sm leading-5 text-gray-900">{{ $ingredient->name }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                <a href="{{ route('admin.ingredients.edit', $ingredient->id) }}" class="text-indigo-600 hover:text-indigo-900">Редактировать</a>

                                <form action="{{ route('admin.ingredients.destroy', $ingredient->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Удалить</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-700">Ингредиенты отсутствуют.</p>
        @endif
    </div>
@endsection
