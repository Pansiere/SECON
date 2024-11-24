@extends("layouts.main")
@section("content")
    <div class="flex items-center justify-center min-h-full bg-gray-100">
        <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-md">

            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="category_name" class="block text-gray-700 font-semibold mb-2">Nome da Categoria</label>
                    <input
                        type="text"
                        id="category_name"
                        name="category_name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Digite o nome da categoria"
                        required
                    />
                </div>

                <!-- Botão de Salvar -->
                <div class="flex justify-center mt-6">
                    <a href="/perfil" class="text-gray-600 hover:text-gray-800">Cancelar</a>
                    <button
                        type="submit"
                        class="bg-blue-500 text-white font-semibold px-6 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        Salvar Categoria
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
