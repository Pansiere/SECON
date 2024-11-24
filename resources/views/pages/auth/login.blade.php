<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

<div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-center text-gray-800">Seja bem-vindo(a)</h2>
    <h3 class="text-2xl font-bold text-center text-gray-800" >Login</h3>

    @if ($errors->any())
        <div class="bg-red-200 p-1 text-red-900 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="space-y-6" action="{{ route('login.auth') }}" method="POST">
        @csrf
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

        <!-- Botão de Login -->
        <button type="submit" class="w-full py-2 mt-4 font-semibold text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Entrar
        </button>
    </form>

    <!-- Links para Esqueci a Senha e Registro -->
    <div class="text-sm text-center text-gray-500">
        <a href="#" class="font-medium text-indigo-600 hover:underline">Esqueci a senha</a> |
        <a href="/registrar" class="font-medium text-indigo-600 hover:underline">Registrar-se</a>
    </div>
</div>

</body>
</html>
