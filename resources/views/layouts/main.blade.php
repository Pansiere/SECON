<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>{{ $title }} - SECON</title>
</head>

<body class="flex min-h-screen overflow-hidden">
<aside class="sidebar w-0.5/4 p-4 bg-gray-100 min-h-screen flex flex-col">
    <div class="profile mb-6 text-center">
        <img src="#.jpg" alt="Foto de Perfil" class="w-24 h-24 rounded-full mx-auto mb-2">
        <p class="font-bold">João Pedro</p>
    </div>

    <h2 class="font-bold text-lg">Menu de Navegação</h2>
    <ul class="mt-4">
        <li><a href="/transacoes" class="text-blue-500 hover:underline">Transações</a></li>
        <li><a href="/categorias" class="text-blue-500 hover:underline">Categorias</a></li>
        <li><a href="/configuracoes" class="text-blue-500 hover:underline">Configurações</a></li>
    </ul>
    <a href="{{ route('login.destroy') }}" class="mt-auto">
        <div class="w-full bg-red-500 text-white text-center py-2 rounded hover:bg-red-600 focus:outline-none">
            Sair
        </div>
    </a>
</aside>

<div class="flex flex-col flex-grow h-screen">
    <header class="header p-4 bg-gray-200">
        {{ $header }}
    </header>

    <main class="content flex-grow p-4 overflow-y-auto">
        @yield('content')
    </main>

    <footer class="footer p-4 bg-gray-200">
        SECON - Sistema de Economia e Controle Financeiro
    </footer>
</div>
</body>
</html>
