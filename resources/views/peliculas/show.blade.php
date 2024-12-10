<x-app-layout>
    @php
        $total = 0;
    @endphp

    @foreach ($pelicula->proyecciones as $proyeccion)
        @php
            $total += $proyeccion->entradas->count();
        @endphp
    @endforeach

    <div class="text-gray-700 text-lg mt-4 mx-auto">
        <div>{{$pelicula->titulo}}</div>
        Total de entradas vendidas:
        <div class="text-green-600">{{ $total }}</div>
    </div>
</x-app-layout>
