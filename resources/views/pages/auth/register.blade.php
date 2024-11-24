<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

<div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-center text-gray-800">Criar Conta</h2>

    @if ($errors->any())
        <div class="bg-red-200 p-1 text-red-900 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="space-y-6" action="{{ route('registrar.store') }}" method="POST">
        @csrf
        <!-- Campo de Nome -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
            <input type="text" id="name" name="name" required class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        </div>

        <!-- Campo de E-mail -->
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
            <input type="email" id="email" name="email" required class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        </div>

        <!-- Campo de Senha -->
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
            <input type="password" id="password" name="password" required class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        </div>

        <!-- Campo de Confirmação de Senha -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirme a Senha</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full px-4 py-2 mt-1 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
        </div>

        <!-- Botão de Registro -->
        <button type="submit" class="w-full py-2 mt-4 font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Registrar
        </button>
    </form>

    <!-- Link para Login -->
    <div class="text-sm text-center text-gray-500">
        Já tem uma conta? <a href="/login" class="font-medium text-indigo-600 hover:underline">Entrar</a>
    </div>
</div>

</body>
</html>
