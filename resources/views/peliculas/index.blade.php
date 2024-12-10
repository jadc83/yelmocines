<x-app-layout>
    <div class="bg-gray-400 rounded-xl p-4 w-6/12">
        @if (session('error'))
            <div class="alert alert-success">
                {{ session('error') }}
            </div>
        @endif
        @foreach ($peliculas as $pelicula)
            <div class="border-b border-gray-300 py-2">
                <p class="text-lg font-semibold">{{ $pelicula->titulo }}</p>
                <div class="flex gap-2 mt-2">
                    <form action="{{ route('peliculas.edit', $pelicula) }}" method="get">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white py-1 px-3 rounded">
                            Editar
                        </button>
                    </form>

                    <form action="{{ route('peliculas.show', $pelicula) }}" method="get">
                        @csrf
                        <button type="submit" class="bg-orange-500 text-white py-1 px-3 rounded">
                            Detalles
                        </button>
                    </form>

                    <form action="{{ route('peliculas.destroy', $pelicula) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">
                            Borrar
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            <form action="{{ route('peliculas.create') }}" method="get">
                @csrf
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">
                    Crear nueva película
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
