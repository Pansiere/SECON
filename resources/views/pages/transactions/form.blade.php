@extends("layouts.main")

@section("content")
    <div class="bg-white p-8 rounded-lg shadow-md w-full">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Adicionar Transação</h2>

        <form action="#" method="POST" class="space-y-4">

            <!-- Data -->
            <div>
                <label for="date" class="block text-gray-700 font-medium mb-2">Data</label>
                <input type="date" id="date" name="date" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500" required>
            </div>

            <!-- Descrição -->
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Descrição</label>
                <input type="text" id="description" name="description" placeholder="Descrição da transação" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500" required>
            </div>

            <!-- Categoria -->
            <div>
                <label for="category" class="block text-gray-700 font-medium mb-2">Categoria</label>
                <select id="category" name="category" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500" required>
                    <option value="">Selecione uma categoria</option>
                    <option value="alimentacao">Alimentação</option>
                    <option value="transporte">Transporte</option>
                    <option value="lazer">Lazer</option>
                    <option value="saude">Saúde</option>
                    <option value="educacao">Educação</option>
                    <option value="outros">Outros</option>
                </select>
            </div>

            <!-- Tipo -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Tipo</label>
                <div class="flex items-center space-x-4">
                    <label class="inline-flex items-center">
                        <input type="radio" name="type" value="entrada" class="text-blue-500 focus:ring focus:ring-blue-500" required>
                        <span class="ml-2 text-gray-700">Entrada</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="type" value="saida" class="text-blue-500 focus:ring focus:ring-blue-500">
                        <span class="ml-2 text-gray-700">Saída</span>
                    </label>
                </div>
            </div>

            <!-- Valor -->
            <div>
                <label for="value" class="block text-gray-700 font-medium mb-2">Valor</label>
                <input type="number" id="value" name="value" placeholder="R$ 0,00" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500" step="0.01" required>
            </div>

            <!-- Botão de Enviar -->
            <div>
                <button type="submit" class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-500">
                    Adicionar Transação
                </button>
            </div>
        </form>
    </div>
@endsection
