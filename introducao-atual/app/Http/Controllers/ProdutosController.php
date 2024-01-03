<?php

namespace App\Http\Controllers;

use App\Models\produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = produto::orderby("id","desc")->paginate();
        return view("produtos.index",["produtos" => $produtos]);
    }

    public function create()
    {
        return view("produtos.create");
    }

    public function insert(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->valor = $request->valor;
        $produto->estoque = $request->estoque;
        $produto->descricao = $request->descricao;
        $produto->save();
        return redirect()->route("produtos");
    }

    public function show($id)
    {
        $produto = produto::find($id);
        return view("produtos.show",["produto" => $produto]);
    }

    public function edit(produto $produto)
    {
        return view("produtos.edit",["produto" => $produto]);
    }

    // public function show($nome,$valor = null)
    // {
    //     return view("produtos.show",["nome" => $nome,"valor" => $valor]);
    //     if($valor)
    //     {
    //         return "O nome do produto é $nome, e seu valor é $valor";
    //     }else{
    //         return "O nome do produto é $nome";
    //     }
    // }
}