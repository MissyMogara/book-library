<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Aplicación')</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header class="p-5 bg-cyan-700 flex justify-around items-center gap-x-4 text-white">
    <nav class="flex gap-x-6">
        <a href="#">Inicio</a>
        <a href="#">Acerca</a>
        <a href="#">Contacto</a>
    </nav>
    </header>
    <main class="min-h-screen">
        @yield('content') 
    </main>
    <footer class="p-5 bg-gray-800 flex flex-col justify-around items-center gap-x-4 text-white">
        <div class="text-center">
            <p>&copy; 2025 Mi Aplicación</p>
            <p>Todos los derechos reservados</p>
        </div>
        <nav class="flex gap-x-6">
            <a href="#" class="hover:underline">Política de Privacidad</a>
            <a href="#" class="hover:underline">Términos de Uso</a>
            <a href="#" class="hover:underline">Contacto</a>
        </nav>
    </footer>
</body>
</html>