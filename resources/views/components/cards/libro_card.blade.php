<div class="text-center bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Portada del libro -->
    <img 
        src="{{ $portada ?? 'https://via.placeholder.com/150' }}" 
        alt="Portada del libro" 
        class="w-full h-48 object-cover"
    >

    <div class="p-4">
        <h2 class="text-lg font-semibold text-gray-800">{{ $titulo ?? 'Título no disponible' }}</h2>
        <h3 class="text-sm text-gray-600 mb-4">ISBN: {{ $isbn ?? 'ISBN no disponible' }}</h3>
        <p class="text-gray-700 mb-4">Año de publicación: {{ $anioPublicacion ?? 'Año no disponible' }}</p>
        <p class="text-gray-700 mb-4">Estado: {{ $estado ?? 'Estado no disponible' }}</p>
    </div>

    <div class="flex justify-around items-center bg-gray-100 p-4">
        <h6 class="text-sm text-gray-600">
            Autor: {{ $autor ?? 'Autor no disponible' }}
        </h6>
        <span class="text-gray-400">|</span>
        <h6 class="text-sm text-gray-600">
            Ubicación: {{ $ubicacion ?? 'Ubicación no disponible' }}
        </h6>
    </div>
</div>