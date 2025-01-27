<div class="text-center bg-white rounded-lg shadow-md overflow-hidden">
    <div class="p-4">
        <h2 class="text-lg font-semibold text-gray-800">{{ $biblioteca ?? 'Biblioteca no disponible' }}</h2>
        <h3 class="text-sm text-gray-600 mb-4">Dirección: {{ $direccion ?? 'Dirección no disponible' }}</h3>
        <p class="text-gray-700 mb-4">Número de estanterías: {{ $numeroEstanterias ?? 'Número no disponible' }}</p>
    </div>
</div>