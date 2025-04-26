<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Hash;
use Session;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CRUD User controller
 */
class ProductController extends Controller
{
    public function product(Request $request)
    {
        $product_id = $request->get('id');
        $product = Products::find($product_id);

        $users = $product->users()->paginate(10);

        $data = [
            'product' => $product,
            'users' => $product->users
        ];



        return view('product.view', $data);
    }
}