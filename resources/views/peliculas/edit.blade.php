<x-app-layout>
    <form action="{{ route('peliculas.update', $pelicula) }}" method="post"> <!-- Cambié de 'get' a 'post' -->
        @csrf
        @method('put')

        <div>
            <x-input-label for="titulo"/>
            <x-text-input name="titulo" id="titulo" type="text" class="block mt-1 w-full" value="{{ old('titulo', $pelicula->titulo) }}" />
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar película</button>
        </div>
    </form>
</x-app-layout>
