<?php

namespace App\Http\Controllers;

use App\Models\produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = produto::paginate();
        return view("produtos.index",["produtos" => $produtos]);
    }

    public function create()
    {
        return view("produtos.create");
    }

    public function insert()
    {
        
    }

    public function show($id)
    {
        $produto = produto::find($id);
        return view("produtos.show",["produto" => $produto]);
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