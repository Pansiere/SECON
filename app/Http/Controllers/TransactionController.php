<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    private string $title = 'Transações';

    public function index()
    {
        return view('pages.transactions.index', [
            'title' => $this->title,
            'header' => 'Transações'
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view("pages.transactions.form", [
            'title' => $this->title,
            'header' => 'Adicionar Transação'
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
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
        //
    }
}
