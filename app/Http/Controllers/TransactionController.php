<?php

namespace App\Http\Controllers;

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

    public function getbygatein(Request $request){
        $getTransaction = Transaction::where('gatein_id',$request->gatein_id)->get();

        $formatedData = [];

        foreach($getTransaction as $transaction){
            $tarrif = MasterTarrif::where('id',$transaction->tarrif_id)->first();
            $gatein = GateIn::where('id',$transaction->gatein_id)->first();
            $damage = MasterDamage::where('id',$tarrif->damade_id)->first();
            $repair = MasterRepair::where('id',$tarrif->repair_id)->first();
            $material = MasterMaterial::where('id',$tarrif->material_id)->first();

            $formatedData[] = [
                'before_file1'=> $transaction->before_file1,
                'before_file2'=> $transaction->before_file2,
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
                'material' => $material
            ];
        }
        return $formatedData;
    }

    public function getbytarrif(Request $request){

        $getTransaction = Transaction::where('tarrif_id',$request->tarrif_id)->where('gatein_id',$request->gatein_id)->get();

        $formatedData = [];

        foreach($getTransaction as $transaction){
            $tarrif = MasterTarrif::where('id',$transaction->tarrif_id)->first();
            $formatedData[] = [
                'before_file1'=> $transaction->before_file1,
                'before_file2'=> $transaction->before_file2,
                'labour_hr' => $transaction->labour_hr,
                'labour_cost' => $transaction->labour_cost,
                'material_cost' => $transaction->material_cost,
                'sab_total' => $transaction->sab_total,
                'gst' => $transaction->gst,
                'tax_cost' => $transaction->tax_cost,
                'total' => $transaction->total,
                'qty' => $transaction->qty,
                'tarrifData' => $tarrif,
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
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
