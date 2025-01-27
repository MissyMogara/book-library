<a href="{{ $ruta }}" class="inline-flex items-center text-gray-700 hover:text-primary-600">
    <button type="button" id="{{ $identifier }}"  {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-'.$color.'-700 hover:bg-'.$color.'-800 focus:ring-4 focus:ring-primary-300']) }}>
         {{ $slot }}
    </button>
</a>
