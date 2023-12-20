<?php

namespace App\Http\Controllers;

use App\Models\AccountManagement;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;


class AccountManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;
    public function index()
    {
        return view('account.create');
    }

    public function all()
    {
        return view('account.view');
    }

    public function get(Request $request)
    {
        return AccountManagement::get();
        
    }

    public function getbyid(Request $request){
        return AccountManagement::where('id',$request->id)->first();
    }

    public function getAccountData(Request $request){
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


        $accountData = AccountManagement::where([
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('bank_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('account_no', 'LIKE', '%' . $search . '%')
                        ->orWhere('ifsc', 'LIKE', '%' . $search . '%')
                        ->orWhere('branch_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('account_holder', 'LIKE', '%' . $search . '%')
                        ->get();
                }
            }],
        ])->orderby('created_at','desc')->paginate($datalimit);
        
        $formetedData = [];

        foreach($accountData as $account){
            $formetedData[] = [
                'bank_name' => $account->bank_name,
                'account_no' => $account->account_no,
                'ifsc' => $account->ifsc,
                'branch_name' => $account->branch_name,
                'account_holder' => $account->account_holder,
                'id' => $account->id,
            ];
            
        } 
    	return response()->json([
            'data' => $formetedData,
            'pagination' => [
                'current_page' => $accountData->currentPage(),
                'per_page' => $accountData->perPage(),
                'total' => $accountData->total(),
                'last_page' => $accountData->lastPage(),
                'from' => $accountData->firstItem(),
                'to' => $accountData->lastItem(),
                'links' => [
                    'prev' => $accountData->previousPageUrl(),
                    'next' => $accountData->nextPageUrl(),
                    'all_pages' => $accountData->getUrlRange(1, $accountData->lastPage()),
                ],
            ],
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAccountManagementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createAccount = AccountManagement::create([
            'bank_name'=> $request->bank_name,
            'account_no'=> $request->account_no,
            'ifsc'=> $request->ifsc,
            'branch_name'=> $request->branch_name,
            'account_holder'=> $request->account_holder,
        ]);


        if($createAccount){
            return response()->json([
                'status' => "success",
                'message' => "Bank Added Successfully"
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
     * @param  \App\Models\AccountManagement  $accountManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $accountDetails = AccountManagement::find($request->id);

        $accountDetails->bank_name =  is_null($request->bank_name) ? $accountDetails->bank_name : $request->bank_name;
        $accountDetails->account_no =  is_null($request->account_no) ? $accountDetails->account_no : $request->account_no;
        $accountDetails->ifsc =  is_null($request->ifsc) ? $accountDetails->ifsc : $request->ifsc;
        $accountDetails->branch_name =  is_null($request->branch_name) ? $accountDetails->branch_name : $request->branch_name;
        $accountDetails->account_holder =  is_null($request->account_holder) ? $accountDetails->account_holder : $request->account_holder;
        $accountDetails->updated_at = date('Y-m-d H:i:s');

        $accountDetails  = $accountDetails->save();

        if($accountDetails){
            return response()->json([
                'status' => "success",
                'message' => "Bank Updated Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAccountManagementRequest  $request
     * @param  \App\Models\AccountManagement  $accountManagement
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountManagement  $accountManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      

        $contractor = AccountManagement::find($request->id);

        
        if (is_null($contractor)) {
            throw new NotFoundHttpException('Invalid Workshop Id!');
        }else{
            
            $deletecontractor= $contractor->delete();
            if($deletecontractor){
                return response()->json([
                    'status'=> "success",
                    'message' => "Bank Deleted Successfully"
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
