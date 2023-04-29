<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Stock;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class PurchaseController extends Controller
{
  
    public function PurchaseAll(){

        $allData = Purchase::orderBy('date','desc')->orderBy('id','desc')->get();
        return view('backend.purchase.purchase_all',compact('allData'));

    } // End Method 

    public function PurchaseAdd(){

        $stock = Stock::all();
        return view('backend.purchase.purchase_add',compact('stock'));

    } // End Method 
   

    public function PurchaseStore(Request $request){

        if ($request->product_id == null) {
    
           $notification = array(
            'message' => 'Sorry you do not select any item', 
            'alert-type' => 'error'
        );
        return redirect()->back( )->with($notification);
        } else {
    
            $count_product = count($request->product_id);
            for ($i=0; $i < $count_product; $i++) { 
                $purchase = new Purchase();
                $purchase->date = date('Y-m-d', strtotime($request->date[$i]));
                $purchase->purchase_no = $request->purchase_no[$i];
                $purchase->product_id = $request->product_id[$i];
                $purchase->buying_qty = $request->buying_qty[$i];
                $purchase->unit_price = $request->unit_price[$i];
                $purchase->dosage = $request->dosage[$i];
                $purchase->type = $request->type[$i];
                $purchase->buying_price = $request->buying_price[$i];
    
                $purchase->created_by = Auth::user()->id;
                $purchase->save();
            } // end foreach
        } // end else 
    
        $notification = array(
            'message' => 'Data Save Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('purchase.all')->with($notification); 
        }// End Method 



        public function PurchaseDelete($id){

            Purchase::findOrFail($id)->delete();


            $notification = array(
                'message' => 'Purchase Iteam Deleted Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification); 
        }// End Method 
    


}
