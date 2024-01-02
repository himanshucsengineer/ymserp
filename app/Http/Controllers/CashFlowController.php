<?php

namespace App\Http\Controllers;
use App\Models\InvoiceManagement;
use App\Models\AccountManagement;
use App\Models\User;
use App\Models\MasterEmployee;

use App\Models\CashFlow;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class CashFlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('cashflow.create');
    }

    public function all()
    {
        return view('cashflow.view');
    }

    public function calculateamount(Request $request){
        $invoiceData = InvoiceManagement::where([
            ['depo_id',$request->depo_id],
            ['createdby',$request->user_id],
            ['payment_method','Cash'],
        ])->get();

        $invoice_amount = 0;
        $cash_in_person = 0;
        $submitted_amount = 0;
        $account_submitted_amount = 0;

        $cashInPersonData = CashFlow::where([
            ['type','person'],
            ['transfer_to',$request->user_id],
        ])->get();



        $submitInAccount = CashFlow::where([
            ['type','account'],
            ['transfer_from',$request->user_id],
        ])->get();

        $submittedAmountData = CashFlow::where([
            ['type','person'],
            ['transfer_from',$request->user_id],
        ])->get();

        foreach($submitInAccount as $InAccount){
            $account_submitted_amount = $account_submitted_amount + $InAccount['amount'];
        }

        foreach($invoiceData as $invoice){
            $invoice_amount = $invoice_amount + $invoice['amount'];
        }

        foreach($cashInPersonData as $cashInPerson){
            $cash_in_person = $cash_in_person + $cashInPerson['amount'];
        }

        foreach($submittedAmountData as $submittedAmount){
            $submitted_amount = $submitted_amount + $submittedAmount['amount'];
        }

        $totalInhand = $invoice_amount + $cash_in_person;
        $totalsubmittedamount = $account_submitted_amount + $submitted_amount;
        $remainingamount = $totalInhand - $totalsubmittedamount;

        return response()->json([
            'status' => "Success",
            'amount' => $remainingamount
        ], 200);
    }


    public function get(Request $request)
    {
        if($request->user_id == 1){
            return CashFlow::get();
        }else{
            return CashFlow::where('transfer_from',$request->user_id)->get();
        }
    }


    public function getbyid(Request $request){
        return CashFlow::where('id',$request->id)->first();
    }

    public function getCashflowData(Request $request){
        $datalimit = '';

        if($request->page == "*"){
            $datalimit= 999999999;
        }else{
            $datalimit = 25;
        }

        if($request->search == "undefined" || $request->search == "null" || $request->search == "NULL" || $request->search == "true" || $request->search == "TRUE" || $request->search == "false" || $request->search == "FALSE"){
            return response()->json([
                'status' => "error",
                'message' => 'Search Value Can not be undefined, null and boolean!'
            ], 400);
        }

        if($request->page == "undefined" || $request->page == "null" || $request->page == "NULL" || $request->page == "true" || $request->page == "TRUE" || $request->page == "false" || $request->page == "FALSE"){
            return response()->json([
                'status' => "error",
                'message' => 'Page Value Can not be undefined, null and boolean!'
            ], 400);
        }


        if($request->search){
            $accountData =  AccountManagement::where('bank_name', 'LIKE', '%' . $request->search . '%')->get();
            $accountId = [];
            if(count($accountData)>0){
                foreach($accountData as $account){
                    array_push($accountId, $account->id);
                }
            }
        }else{
            $accountId = [];
        }

        if($request->user_id == 1){

            $cashflowData = CashFlow::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('type', 'LIKE', '%' . $search . '%')
                            ->orWhere('amount', 'LIKE', '%' . $search . '%')
                            ->orWhereIn('account_id',$accountId)
                            ->get();
                    }
                }],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }else{

            $cashflowData = CashFlow::where([
                [function ($query) use ($request) {
                    if (($search = $request->search)) {
                        $query->orWhere('type', 'LIKE', '%' . $search . '%')
                            ->orWhere('amount', 'LIKE', '%' . $search . '%')
                            ->orWhereIn('account_id',$accountId)
                            ->get();
                    }
                }],
                ['transfer_from',$request->user_id],
            ])->orderby('created_at','desc')->paginate($datalimit);
        }
        
        $formetedData = [];

        foreach($cashflowData as $cashflow){
            if($cashflow->account_id){
                $bankData = AccountManagement::where('id',$cashflow->account_id)->first();
                $bank_name = $bankData->bank_name;
            }else{
                $bank_name = '';
            }
            
            if($cashflow->transfer_to){
                $userData = User::where('id',$cashflow->transfer_to)->first();
                $getEmployee = MasterEmployee::where('id',$userData->employee_id)->first();
    
                $employeeName = $getEmployee->employee_code . ' - '. $getEmployee->firstname . ' ' .$getEmployee->middlename . ' '. $getEmployee->lastname;
    
            }else{
                $employeeName = '';
            }

           
            $formetedData[] = [
                'type' => $cashflow->type,
                'amount' => $cashflow->amount,
                'bank_name' => $bank_name,
                'person_name' => $employeeName,
                'id' => $cashflow->id,
            ];
            
        } 
    	return response()->json([
            'data' => $formetedData,
            'pagination' => [
                'current_page' => $cashflowData->currentPage(),
                'per_page' => $cashflowData->perPage(),
                'total' => $cashflowData->total(),
                'last_page' => $cashflowData->lastPage(),
                'from' => $cashflowData->firstItem(),
                'to' => $cashflowData->lastItem(),
                'links' => [
                    'prev' => $cashflowData->previousPageUrl(),
                    'next' => $cashflowData->nextPageUrl(),
                    'all_pages' => $cashflowData->getUrlRange(1, $cashflowData->lastPage()),
                ],
            ],
        ]); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCashFlowRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createCashflow = CashFlow::create([
            'account_id'=> $request->bank_id,
            'type'=> $request->type,
            'amount' => $request->amount,
            'transfer_from' => $request->transfer_from,
            'transfer_to' => $request->transfer_to
        ]);

        if($createCashflow){
            return response()->json([
                'status' => "success",
                'message' => "Cashflow Added Successfully"
            ], 201);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 406);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function show(CashFlow $cashFlow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCashFlowRequest  $request
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $cashflowDetails = CashFlow::find($request->id);

        $cashflowDetails->account_id =  is_null($request->bank_id) ? $cashflowDetails->account_id : $request->bank_id;
        $cashflowDetails->type =  is_null($request->type) ? $cashflowDetails->type : $request->type;
        $cashflowDetails->amount =  is_null($request->amount) ? $cashflowDetails->amount : $request->amount;
        $cashflowDetails->transfer_from =  is_null($request->transfer_from) ? $cashflowDetails->transfer_from : $request->transfer_from;
        $cashflowDetails->transfer_to =  is_null($request->transfer_to) ? $cashflowDetails->transfer_to : $request->transfer_to;
        $cashflowDetails->updated_at = date('Y-m-d H:i:s');

        $cashflowDetails  = $cashflowDetails->save();

        if($cashflowDetails){
            return response()->json([
                'status' => "success",
                'message' => "Cashflow Updated Successfully"
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
     * @param  \App\Models\CashFlow  $cashFlow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $contractor = CashFlow::find($request->id);
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid Workshop Id!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "Cashflow Deleted Successfully"
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
