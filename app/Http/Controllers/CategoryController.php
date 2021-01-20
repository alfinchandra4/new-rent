<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index () {
        return view('category.index');
    }

    public function products ($category_id) {
        $products = Product::where('category_id', $category_id)->get();
        return view('category.products', [
            'products' => $products,
            'category_id' => $category_id,
        ]);
    }
}
