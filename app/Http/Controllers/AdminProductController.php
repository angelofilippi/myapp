<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Str;

use Illuminate\Support\Facades;

class AdminProductController extends Controller
{
      public function index(){

            $product = Product::all();
        return view('admin.product', compact('product'));
    }
    
    //Método para mostrar a pagina editar produto

    public function edit() {
        return view('admin.product_edit');
    }

    //Método para receber requisição e dar update - PUT
    public function update() {
        
    }

     //Método para criar um produto novo - POST
    public function create() {
        return view('admin.product_create');
        
    }

     //Método para receber requisição de criação de produto - POST
    public function store(Request $request) {
        
        //valida o input para não ser vazio

        $input = $request->validate([
            'name' => 'string|required',
            'price' => 'numeric|required',
            'stock' => 'numeric|required',
            'cover' => 'string|nullable',
            'description' => 'string|nullable'
        ]);

        $input['slug'] = Str::slug($input['name']);

        if(!empty ($input['cover']) && $input['cover']->isValid()){
            $file = $input['cover'];
            $patch = $file->store('public/product');
            $input['cover'] = $patch;
        }
        
        Product::create($input);

        return \Redirect::route('admin.product');

    }

}
