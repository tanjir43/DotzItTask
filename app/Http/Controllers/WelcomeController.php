<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductUser;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index () {
        $products = Product::all();
        return view('welcome',compact('products'));
    }
    public function detail($id) {
        $productUser = ProductUser::where('product_id',$id);

        #dd($productUser);
        return view('detail');
    }
}

