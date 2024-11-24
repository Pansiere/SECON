@extends("layouts.main")

@section("content")
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Editar Perfil</h2>

        <!-- Formulário de Edição -->
        <form action="/atualizar-perfil" method="POST" enctype="multipart/form-data">

            <!-- Nome -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="nome">Nome</label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Seu nome"
                    required>
            </div>

            <!-- Imagem de Perfil -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="imagem">Imagem de Perfil</label>
                <input
                    type="file"
                    id="imagem"
                    name="imagem"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Formatos suportados: JPG, PNG.</p>
            </div>

            <!-- Senha -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2" for="senha">Senha</label>
                <input
                    type="password"
                    id="senha"
                    name="senha"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Digite sua nova senha">
            </div>

            <!-- Confirmação da Senha -->
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2" for="confirmar-senha">Confirmar Senha</label>
                <input
                    type="password"
                    id="confirmar-senha"
                    name="confirmar-senha"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Confirme sua nova senha">
            </div>

            <!-- Botões -->
            <div class="flex justify-between items-center">
                <a href="/perfil" class="text-gray-600 hover:text-gray-800">Cancelar</a>
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-600">
                    Salvar Alterações
                </button>
            </div>

        </form>
    </div>
@endsection
