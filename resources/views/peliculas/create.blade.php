<x-app-layout>
    <form action="{{ route('peliculas.store') }}" method="post">
        @csrf
        <div>
            <x-input-label for="titulo" />
            <x-text-input name="titulo" id="titulo" type="text" class="block mt-1 w-full"/>
        </div>

        <div class="mt-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Crear nueva película
            </button>
        </div>
    </form>
</x-app-layout>
