@extends('layout.admin')

@section('title', isset($post) ? "Редактировать рецепт ID {$post->id}" : 'Добавить рецепт')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h3 class="text-gray-700 text-3xl font-medium">{{ isset($post) ? "Редактировать рецепт ID {$post->id}" : 'Добавить рецепт' }}</h3>

        <div class="mt-8"></div>

        <div class="mt-8">
            <form enctype="multipart/form-data" class="space-y-5 mt-5" method="POST" action="{{ isset($post) ? route("admin.posts.update", $post->id) : route("admin.posts.store") }}">
                @csrf

                @if(isset($post))
                    @method('PUT')
                @endif

                <input name="title" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('title') border-red-500 @enderror" placeholder="Название" value="{{ $post->title ?? '' }}" />

                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="preview" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('preview') border-red-500 @enderror" placeholder="Кратко" value="{{ $post->preview ?? '' }}" />

                @error('preview')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <input name="description" type="text" class="w-full h-12 border border-gray-800 rounded px-3 @error('description') border-red-500 @enderror" placeholder="Описание" value="{{ $post->description ?? '' }}" />

                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                @if(isset($post) && $post->thumbnail)
                    <div>
                        <img class="h-64 w-64" src="{{ asset('storage/' . $post->thumbnail) }}">
                    </div>
                @endif

                <input name="thumbnail" type="file" class="w-full h-12" placeholder="Обложка" />

                @error('thumbnail')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                {{-- Выпадающий список ингредиентов и их количества --}}
                <label for="ingredients" class="block text-sm font-medium text-gray-700">Ингредиенты и их количества</label>

                <select name="ingredients[]" multiple class="w-full h-12 border border-gray-800 rounded px-3 @error('ingredients') border-red-500 @enderror">
                    @foreach($allIngredients as $ingredient)
                        <option value="{{ $ingredient->id }}" {{ isset($post) && in_array($ingredient->id, old('ingredients', $post->ingredients->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                            {{ $ingredient->name }}
                        </option>
                    @endforeach
                </select>

                @error('ingredients')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

                <button type="submit" class="text-center w-full bg-blue-900 rounded-md text-white py-3 font-medium">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
