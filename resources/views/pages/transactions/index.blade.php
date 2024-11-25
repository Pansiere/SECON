@extends("layouts.main")

@section("content")
    <div class="dashboard p-6 space-y-6">

        <div class="flex justify-between items-center bg-gray-100 p-4 rounded-md shadow-md">
            <div>
                <h2 class="text-xl font-semibold">Resumo do Mês</h2>
                <p class="text-gray-600">Veja o balanço financeiro deste mês.</p>
            </div>
            <div class="flex space-x-8">
                <div class="text-center">
                    <h3 class="text-lg font-bold text-green-500">Receita</h3>
                    <p class="text-2xl">R$ {{ number_format(num: $income, decimals: 2, decimal_separator: ',', thousands_separator: '.') }} </p>
                </div>
                <div class="text-center">
                    <h3 class="text-lg font-bold text-red-500">Despesa</h3>
                    <p class="text-2xl">R$ {{ number_format(num: $expense, decimals: 2, decimal_separator: ',', thousands_separator: '.') }}</p>
                </div>
                <div class="text-center">
                    <h3 class="text-lg font-bold text-blue-500">Saldo</h3>
                    <p class="text-2xl">{{ number_format(num: $summary, decimals: 2, decimal_separator: ',', thousands_separator: '.') }}</p>
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center bg-white p-4 rounded-md shadow-md">
            <form method="GET" action="#" class="flex space-x-4">
                <div>
                    <label for="month" class="block text-sm font-medium text-gray-700">Mês</label>
                    <select id="month" name="month" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
{{--                        <option value="1">{{ $category->name }}</option>--}}
                        <option value="2">Fevereiro</option>
                        <option value="3" selected>Março</option>
                    </select>
                </div>

                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Categoria</label>
                    <select id="category" name="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">Todas</option>
                        @foreach($categories as $category)
                            <option value="1">{{ $category->name }}</option>
                        @endforeach
                        <option value="1">Alimentação</option>
                        <option value="2">Transporte</option>
                        <option value="3">Lazer</option>
                    </select>
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Tipo</label>
                    <select id="type" name="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        <option value="">Todos</option>
                        <option value="receita">Receita</option>
                        <option value="despesa">Despesa</option>
                    </select>
                </div>

                <button type="submit" class="self-end bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    Filtrar
                </button>
            </form>
        </div>

        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white p-4 rounded-md shadow-md">
            <div class="w-1/2 flex justify-between items-center py-4">
                <h3 class="text-xl font-semibold">Transações Cadastradas</h3>
                <a href="{{ route('transacoes.create') }}" class="text-blue-500 hover:text-blue-700 font-medium">Adicionar nova transação</a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Categoria</th>
                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                    <th class="px-6 py-3 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Valor</th>
                    <th class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($transactions as $transaction)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"> {{ date('d/m/Y', strtotime($transaction->date)) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->description }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $transaction->category->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm {{ $transaction->type === 'Receita' ? 'text-green-500' : 'text-red-500' }}">
                            {{ $transaction->type }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-500">R$ {{ number_format(num: $transaction->value, decimals: 2, decimal_separator: ',', thousands_separator: '.') }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                            <a href="{{ route('transacoes.edit', $transaction->id) }}" class="text-yellow-500 hover:text-yellow-600">Editar</a>
                            <form action="{{ route('transacoes.destroy', $transaction->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 ml-4" onclick="return confirm('Tem certeza que deseja excluir esta transação?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
