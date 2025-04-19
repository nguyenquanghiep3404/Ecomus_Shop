<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $products = Product::with('images')->get();
        return view('users.home')->with([
            'products' => $products
        ]);
        
    }
    
}
