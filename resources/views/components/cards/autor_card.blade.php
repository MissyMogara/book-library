<div class="text-center bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-4">
        <h2 class="text-lg font-semibold text-gray-800">{{ $nombre ?? 'Nombre no disponible' }}</h2>
        <h3 class="mb-4 text-xl text-gray-600">{{ $nacionalidad ?? 'Nacionalidad no disponible' }}</h3>
        <p class="text-gray-700 mb-4">{{ $biografia ?? 'Biografía no disponible' }}</p>
    </div>

    
    <div class="flex justify-around items-center bg-gray-100 p-4">
        <h6 class="text-sm text-gray-600">{{ $fechaNacimiento ?? 'Fecha de nacimiento no disponible' }}</h6>
        <span class="text-gray-400">|</span>
        <h6 class="text-sm text-gray-600">{{ $codigoDewey ?? 'Codigo Dewey no disponible' }}</h6>
    </div>
</div>