<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private string $title = 'Transações';

    public function index()
    {
        $title = $this->title;
        $header = 'Transações';
        $transactions = Transaction::where ('user_id', auth()->id())->get();

        return view('pages.transactions.index', compact('transactions', 'title', 'header'));
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
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaction = new Transaction();

        $transaction->user_id = auth()->id();
        $transaction->type = $request->input('type');
        $transaction->value = $request->input('value');
        $transaction->description = $request->input('description');
        $transaction->category_id = $request->input('category_id');
        $transaction->date = $request->input('date');
        $transaction->save();

        return redirect('/transacoes')->with('success', 'Transação adicionada com sucesso!');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $transacaoId = NULL;
        return view("pages.transactions.edit");
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Transaction::where('id', $id)->delete();

        return redirect('/transacoes')->with('success', 'Transação excluída com sucesso!');
    }
}
