<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class SearchController extends Controller
{
    public function search(Request $request){
        $products=Product::where('name','like','%'.$request->search.'%')->get();
        return response()->json(['success' =>'working','products'=>$products,'text'=>$request->search]);
    }
}