<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::orderBy('name','ASC')->get();
        return response()->json(['data'=>$products , 'error'=>''],200);
    }
}
