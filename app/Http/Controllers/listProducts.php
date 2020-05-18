<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class listProducts extends Controller
{


    public function addToCart(Request $request){

        if ($request->quantity > 0){
            $data = DB::table('products')->get()->where('id',$request->id);
            $product = [$data, $request->quantity];
            $request->session()->push('products', $product);
        }
        return $this->getProducts($request);
    }

    public function TotalCart(Request $request){
        if ($request->session()->has('products')) {
            $count = 0;
            foreach ($request->session()->get('products') as $product){
                $count += (int)$product[1];
            }
            $request->session()->push('count', $count);
            return $count;
        }else{
            return false;
        }
    }

    public function getProducts( Request $request){
        $products = DB::table('products')->get();
        return view('index', ['products' => $products, 'basket' => $request->session()->get('products'), 'count' => $this->TotalCart($request)] );
    }
}
