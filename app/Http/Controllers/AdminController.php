<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(User $user)
    {
        $products = Product::where('user_id', $user->id)->get();
        return view('admin.index', ['products' => $products, 'user' => $user]);
    }
}
