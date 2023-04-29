<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Stock;
use Auth;
use Illuminate\Support\Carbon;

class DefaultController extends Controller
{
    
    public function GetPrice(Request $request){

        $product_id = $request->product_id;
        $allPrice = Stock::where('id',$product_id)->get();
        return response()->json($allPrice);
    } // End Method 

    public function GetDosage(Request $request){

        $product_id = $request->product_id;
        $allDosage = Stock::where('id',$product_id)->get();
        return response()->json($allDosage);
    } // End Method

    public function GetType(Request $request){

        $product_id = $request->product_id;
        $allType = Stock::where('id',$product_id)->get();
        return response()->json($allType);
    } // End Method



}
