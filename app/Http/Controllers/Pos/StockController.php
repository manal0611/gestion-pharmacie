<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    public function StockReport(){

        // $stocks = Stock::all();
           $stocks = Stock::latest()->get();
           return view('backend.stock.stock_report',compact('stocks'));

    }//End Method


    public function StockAdd(){

        return view('backend.stock.stock_add');

    }//End Method

    public function StockStore(Request $request){
       
     
        $data = $request->validate([
            'nom' => 'required|string|max:200',
            'dosage' => 'required|string|max:200',
            'type' => 'required|string|max:200',
            'prix' => 'required|numeric|max:200',
            'date_exp' => 'required|string|max:200',
            'qte_stock' => 'required|numeric|max:200'
           
        ]);
        $data['created_by'] = Auth::user()->id;
        $data['created_at'] =Carbon::now();
        Stock::insert($data);
        
        // Stock::insert([
        //     'nom' => $request->nom,
        //     'prix' => $request->prix,
        //     'dosage' => $request->dosage,
        //     'type' => $request->type,
        //     'date_exp' => $request->date_exp,
        //     'qte_stock' => $request->qte_stock,
        //     'created_by' => Auth::user()->id,
        //     'created_at' => Carbon::now(), 

        // ]);

         $notification = array(
            'message' => 'médicament ajouter avec succès', 
            'alert-type' => 'succès'
        );

        return redirect()->route('stock.report')->with($notification);

    } // End Method 


    public function StockEdit($id){

        $stock = Stock::findOrFail($id);
        return view('backend.stock.stock_edit',compact('stock'));

    } // End Method 

    public function StockUpdate(Request $request){

        $sullier_id = $request->id;

        Stock::findOrFail($sullier_id)->update([
            
            'nom' => $request->nom,
            'dosage'=> $request->dosage,
            'type' => $request-> type,
            'prix' => $request->prix,
            'date_exp' => $request->date_exp,
            'qte_stock' => $request->qte_stock,
            'updated_by' => Auth::user()->id,
            'updated_at' => Carbon::now(), 

        ]);

        $notification = array(
            'message' => 'médicament modifié avec succès', 
            'alert-type' => 'succès'
        );

        return redirect()->route('stock.report')->with($notification);

    } // End Method 

    public function StockDelete($id){

        Stock::findOrFail($id)->delete();
  
         $notification = array(
              'message' => 'médicament supprimé avec succès', 
              'alert-type' => 'succès'
          );
  
          return redirect()->back()->with($notification);
  
      } // End Method 


}
