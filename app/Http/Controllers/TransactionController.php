<?php

namespace App\Http\Controllers;
use App\Models\InvoiceManagement;
use App\Models\LocationCode;

use App\Models\Transaction;
use App\Models\MasterTarrif;
use App\Models\GateIn;
use App\Models\MasterDamage;
use App\Models\MasterRepair;
use App\Models\MasterMaterial;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use App\Models\User;
use \stdClass;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        //
    }


    public function getbytype(Request $request){
        return InvoiceManagement::where('gate_in_id',$request->gateinid)->where('invoice_type',$request->bill_type)->first();

    }

    public function getbygatein(Request $request){
        $getTransaction = Transaction::where('gatein_id',$request->gatein_id)->get();

        $formatedData = [];

        foreach($getTransaction as $transaction){
            $tarrif = MasterTarrif::where('id',$transaction->tarrif_id)->first();
            $gatein = GateIn::where('id',$transaction->gatein_id)->first();
            $damage = MasterDamage::where('id',$tarrif->damade_id)->first();
            $repair = MasterRepair::where('id',$tarrif->repair_id)->first();
            $material = MasterMaterial::where('id',$tarrif->material_id)->first();
            $location_code = LocationCode::where('id',$tarrif->repai_location_code)->first();

            $formatedData[] = [
                'before_file1'=> $transaction->before_file1,
                'before_file2'=> $transaction->before_file2,
                'after_file1'=> $transaction->after_file1,
                'after_file2'=> $transaction->after_file2,
                'labour_hr' => $transaction->labour_hr,
                'labour_cost' => $transaction->labour_cost,
                'material_cost' => $transaction->material_cost,
                'sab_total' => $transaction->sab_total,
                'gst' => $transaction->gst,
                'tax_cost' => $transaction->tax_cost,
                'total' => $transaction->total,
                'qty' => $transaction->qty,
                'tarrifData' => $tarrif,
                'gateindata' => $gatein,
                'damage' => $damage,
                'repair' => $repair,
                'material' => $material,
                'id' => $transaction->id,
                'dimension_h' => $transaction->dimension_h,
                'dimension_w' => $transaction->dimension_w,
                'dimension_l' => $transaction->dimension_l,
                'actual_material' => $transaction->actual_material,
                'repai_location_code' => $location_code->code
            ];
        }
        return $formatedData;
    }

    public function getbytarrif(Request $request){

        $getTransaction = Transaction::where('location_code',$request->location_code)->where('gatein_id',$request->gatein_id)->get();

        $formatedData = [];

        foreach($getTransaction as $transaction){
            $tarrif = MasterTarrif::where('id',$transaction->tarrif_id)->first();
            $damage = MasterDamage::where('id',$tarrif->damade_id)->first();
            $repair = MasterRepair::where('id',$tarrif->repair_id)->first();
            $material = MasterMaterial::where('id',$tarrif->material_id)->first();
            $formatedData[] = [
                'before_file1'=> $transaction->before_file1,
                'before_file2'=> $transaction->before_file2,
                'after_file1'=> $transaction->after_file1,
                'after_file2'=> $transaction->after_file2,

                'labour_hr' => $transaction->labour_hr,
                'labour_cost' => $transaction->labour_cost,
                'material_cost' => $transaction->material_cost,
                'sab_total' => $transaction->sab_total,
                'gst' => $transaction->gst,
                'tax_cost' => $transaction->tax_cost,
                'total' => $transaction->total,
                'qty' => $transaction->qty,
                'actual_material' =>$transaction->qty,
                'tarrifData' => $tarrif,
                'damage_code' => $damage->code,
                'repair_code' => $repair->repair_code,
                'material_code' => $material->material_code,
                'id' => $transaction->id,
                'dimension_h' => $transaction->dimension_h,
                'dimension_w' => $transaction->dimension_w,
                'dimension_l' => $transaction->dimension_l,
            ];
        }

        return $formatedData;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if ($request->hasFile('before_file1')) {
            $before_file1 = $request->file('before_file1');
            $before_file1_Name = time() . '_' . $before_file1->getClientOriginalName();
            $before_file1->move(public_path('uploads/transaction'), $before_file1_Name);
        }

        if ($request->hasFile('before_file2')) {
            $before_file2 = $request->file('before_file2');
            $before_file2_Name = time() . '_' . $before_file2->getClientOriginalName();
            $before_file2->move(public_path('uploads/transaction'), $before_file2_Name);
        }


        $createTransaction = Transaction::create([
            'createdby' => $request->user_id,
            'depo_id' => $request->depo_id,
            'tarrif_id' => $request->tarrif_id,
            'labour_hr' => $request->labour_hr,
            'labour_cost' => $request->labour_cost,
            'material_cost' => $request->material_cost,
            'sab_total' => $request->sab_total,
            'gst' => $request->gst,
            'total' => $request->total,
            'tax_cost' => $request->tax_cost,
            'gatein_id' => $request->gatein_id,
            'qty' => $request->qty,
            'before_file1' => $before_file1_Name,
            'before_file2' => $before_file2_Name,
            'location_code' => $request->location_code,
            'dimension_h'=> $request->reporting_dimension_h,
            'dimension_w'=> $request->reporting_dimension_w,
            'dimension_l'=> $request->reporting_dimension_l,

            'actual_material'=> $request->qty,
        ]);

        if($createTransaction){
            return response()->json([
                'status' => "success",
                'message' => "Added Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $transactionDetails = Transaction::find($request->id);

        if ($request->hasFile('after_file1')) {
            $after_file1 = $request->file('after_file1');
            $after_file1_Name = time() . '_' . $after_file1->getClientOriginalName();
            $after_file1->move(public_path('uploads/transaction'), $after_file1_Name);
        }else{
            $after_file1_Name = $transactionDetails->after_file1;
        }

        if ($request->hasFile('after_file2')) {
            $after_file2 = $request->file('after_file2');
            $after_file2_Name = time() . '_' . $after_file2->getClientOriginalName();
            $after_file2->move(public_path('uploads/transaction'), $after_file2_Name);
        }else{
            $after_file2_Name = $transactionDetails->after_file2;
        }
        

        $transactionDetails->labour_hr = is_null($request->reporting_labour_hr) ? $transactionDetails->labour_hr : $request->reporting_labour_hr;
        $transactionDetails->labour_cost =  is_null($request->reporting_labour_cost) ? $transactionDetails->labour_cost : $request->reporting_labour_cost;
        $transactionDetails->material_cost = is_null($request->reporting_material_cost) ? $transactionDetails->material_cost : $request->reporting_material_cost;
        $transactionDetails->sab_total = is_null($request->reporting_sub_total) ? $transactionDetails->sab_total : $request->reporting_sub_total;
        $transactionDetails->tax_cost = is_null($request->reporting_tax_cost) ? $transactionDetails->tax_cost : $request->reporting_tax_cost;
        $transactionDetails->gst = is_null($request->reporting_tax) ? $transactionDetails->gst : $request->reporting_tax;
        $transactionDetails->total = is_null($request->reporting_total) ? $transactionDetails->total : $request->reporting_total;
        $transactionDetails->qty = is_null($request->reporting_qty) ? $transactionDetails->qty : $request->reporting_qty;
        $transactionDetails->dimension_h = is_null($request->reporting_dimension_h) ? $transactionDetails->dimension_h : $request->reporting_dimension_h;
        $transactionDetails->dimension_w = is_null($request->reporting_dimension_w) ? $transactionDetails->dimension_w : $request->reporting_dimension_w;
        $transactionDetails->dimension_l = is_null($request->reporting_dimension_l) ? $transactionDetails->dimension_l : $request->reporting_dimension_l;
        $transactionDetails->actual_material = is_null($request->actual_material) ? $transactionDetails->actual_material : $request->actual_material;
        $transactionDetails->after_file1 = $after_file1_Name;
        $transactionDetails->after_file2 = $after_file2_Name;
        
        $transactionDetails  = $transactionDetails->save();

        if($transactionDetails){
            return response()->json([
                'status' => "success",
                'message' => "Transaction Updated Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        $line = Transaction::find($request->id);
        
        if (is_null($line)) {
            throw new NotFoundHttpException('Invalid Id!');
        }else{
            if($request->before_file1){
                $before_file1 = public_path('uploads/transaction/'.$line->before_file1);
                if (file_exists($before_file1)) {
                    unlink($before_file1);
                }
            }

            if($request->before_file2){
                $before_file2 = public_path('uploads/transaction/'.$line->before_file2);
                if (file_exists($before_file2)) {
                    unlink($before_file2);
                }
            }
        
            $deleteline = $line->delete();
            if($deleteline){
                return response()->json([
                    'status'=> "success",
                    'message' => "Transaction Deleted Successfully"
                ], 200);
            }else{
                return response()->json([
                    'status'=> "error",
                    'message' => "Error In Deletion"
                ], 500);
            }
        }
    }
}
