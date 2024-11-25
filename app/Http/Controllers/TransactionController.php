<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    private string $title = 'Transações';

    public function index()
    {
        $title = $this->title;
        $header = 'Transações';

        $categories = Category::where('user_id', auth()->id())->get();

        $transactions = Transaction::with(['category'])
            ->where('user_id', auth()->id())
            ->whereMonth('date', Carbon::now()->month)
            ->whereYear('date', Carbon::now()->year)
            ->orderBy('date')
            ->get();

        $months = Transaction::selectRaw('MONTH(date) as month')
            ->where('user_id', auth()->id())
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('month')
            ->map(function ($month) {
                return Carbon::create()->month($month)->translatedFormat('F');
            });

        $income = 0;
        $expense = 0;

        foreach($transactions as $transaction){
            switch ($transaction->type) {
                case 'Receita':
                    $income += $transaction->value;
                    break;
                default:
                    $expense += $transaction->value;
                    break;
            }
        }
        $summary = $income - $expense;

        return view('pages.transactions.index', compact('transactions', 'categories', 'title', 'header', 'income', 'expense', 'summary', 'months'));
    }

    public function create()
    {
        $categories = Category::all();
        return view("pages.transactions.form", [
            'title' => $this->title,
            'header' => 'Adicionar Transação',
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required|string',
            'value' => 'required|numeric',
            'description' => 'nullable|string',
            'category_id' => 'required|integer|exists:categories,id',
            'date' => 'required|date',
        ]);

        Transaction::create(array_merge($validatedData, ['user_id' => auth()->id()]));

        return redirect('/transacoes')->with('success', 'Transação adicionada com sucesso!');
    }

    public function edit(string $id)
    {
        $title = $this->title;
        $header = 'Editando transação tal';
        $categories = Category::where('user_id', auth()->id())->get();
        $transaction = Transaction::find($id);

        return view('pages.transactions.form', compact('title', 'header', 'transaction', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        Transaction::where('id', $id)->delete();

        return redirect('/transacoes')->with('success', 'Transação excluída com sucesso!');
    }
}
