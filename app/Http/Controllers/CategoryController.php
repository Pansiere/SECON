<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

/**
 * @method hasMany(string $class)
 */
class CategoryController extends Controller
{
    private string $title = 'Categorias';

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function index()
    {
        $title = $this->title;
        $header = 'Categorias';
        $categories = Category::where('user_id', auth()->id())->get();

        return view('pages.categories.index', compact('categories', 'title', 'header'));
    }

    public function create()
    {
        return view('pages.categories.form', [
            'title' => $this->title,
            'header' => 'Adicionar categoria'
        ]);
    }

    public function store(Request $request)
    {
        $categories = new Category();

        $categories->name = $request->input('category_name');
        $categories->user_id = auth()->id();
        $categories->save();

        return redirect('/categorias')->with('success', 'Categoria adicionada com sucesso!');
    }

    public function edit(string $id)
    {
        $title = $this->title;
        $header = 'Editando categoria tal';
        $category = Category::findOrFail($id);

        return view('pages.categories.form', [
            'title'=>$title,
            'header'=>$header,
            'category'=>$category
        ]);
    }

    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $category->name = $request->category_name;
        $category->save();

        return redirect('/categorias')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $categories = Category::destroy($id);

        return redirect('/categorias')->with('success', 'Categoria deletada com sucesso!');
    }
}
