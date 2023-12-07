<?php

namespace App\Http\Controllers;

use App\Models\VendorMaster;
use App\Http\Requests\StoreVendorMasterRequest;
use App\Http\Requests\UpdateVendorMasterRequest;

use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;

class VendorMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendor.create');
    }

    public function view(){
        return view('vendor.view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVendorMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createVendor = VendorMaster::create([
            'name'=> $request->name,
            'address'=> $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'pincode' => $request->pincode,
            'email' => $request->email,
            'mob_no' => $request->mob_no,
            'tin_no' => $request->tin_no,
            'gst_no' => $request->gst_no,
            'payment_terms' => $request->payment_terms,
            'payment_method' => $request->payment_method,
            'account_no' => $request->account_no,
            'ifsc_code' => $request->ifsc_code,
            'branch' => $request->branch,
            'account_holder_name' => $request->account_holder_name,
            'currency' => $request->currency,
            'vendor_type' => $request->vendor_type,
            'credit_limit' => $request->credit_limit,
        ]);

        if($createVendor){
            return response()->json([
                'status' => "success",
                'message' => "Vendor Added Successfully"
            ], 201);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 406);
        }
    }

    public function getVendorData(Request $request){
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
            ], 406);
        }

        if($request->page == "undefined" || $request->page == "null" || $request->page == "NULL" || $request->page == "true" || $request->page == "TRUE" || $request->page == "false" || $request->page == "FALSE"){
            return response()->json([
                'status' => "error",
                'message' => 'Page Value Can not be undefined, null and boolean!'
            ], 406);
        }

        $vendorData = VendorMaster::where([
            [function ($query) use ($request) {
                if (($search = $request->search)) {
                    $query->orWhere('name', 'LIKE', '%' . $search . '%')
                    ->orWhere('city', 'LIKE', '%' . $search . '%')
                    ->orWhere('state', 'LIKE', '%' . $search . '%')
                    ->orWhere('country', 'LIKE', '%' . $search . '%')
                    ->orWhere('pincode', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%')
                    ->orWhere('mob_no', 'LIKE', '%' . $search . '%')
                    ->orWhere('tin_no', 'LIKE', '%' . $search . '%')
                    ->orWhere('gst_no', 'LIKE', '%' . $search . '%')
                    ->orWhere('account_no', 'LIKE', '%' . $search . '%')
                    ->orWhere('ifsc_code', 'LIKE', '%' . $search . '%')
                    ->orWhere('branch', 'LIKE', '%' . $search . '%')
                    ->orWhere('account_holder_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('currency', 'LIKE', '%' . $search . '%')
                    ->orWhere('vendor_type', 'LIKE', '%' . $search . '%')
                    ->orWhere('credit_limit', 'LIKE', '%' . $search . '%')
                    ->get();
                }
            }],
        ])->orderby('created_at','desc')->paginate($datalimit);
        
        $formetedData = [];

        foreach($vendorData as $vendor){
            $formetedData[] = [
                'id' => $vendor->id,
                'name' => $vendor->name,
                'address' => $vendor->address,
                'city' => $vendor->city,
                'state' => $vendor->state,
                'country' => $vendor->country,
                'pincode' => $vendor->pincode,
                'email' => $vendor->email,
                'mob_no' => $vendor->mob_no,
                'tin_no' => $vendor->tin_no,
                'gst_no' => $vendor->gst_no,
                'payment_terms' => $vendor->payment_terms,
                'payment_method' => $vendor->payment_method,
                'account_no' => $vendor->account_no,
                'ifsc_code' => $vendor->ifsc_code,
                'branch' => $vendor->branch,
                'account_holder_name' => $vendor->account_holder_name,
                'currency' => $vendor->currency,
                'vendor_type' => $vendor->vendor_type,
                'credit_limit' => $vendor->credit_limit,
            ];
            
        } 
    	return response()->json([
            'data' => $formetedData,
            'pagination' => [
                'current_page' => $vendorData->currentPage(),
                'per_page' => $vendorData->perPage(),
                'total' => $vendorData->total(),
                'last_page' => $vendorData->lastPage(),
                'from' => $vendorData->firstItem(),
                'to' => $vendorData->lastItem(),
                'links' => [
                    'prev' => $vendorData->previousPageUrl(),
                    'next' => $vendorData->nextPageUrl(),
                    'all_pages' => $vendorData->getUrlRange(1, $vendorData->lastPage()),
                ],
            ],
        ]); 
    }

    public function getbyid(Request $request){
        return VendorMaster::where('id',$request->id)->first();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VendorMaster  $vendorMaster
     * @return \Illuminate\Http\Response
     */
    public function show(VendorMaster $vendorMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVendorMasterRequest  $request
     * @param  \App\Models\VendorMaster  $vendorMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->id == ''){
            return response()->json([
                'status' => "error",
                'message' => "ID is required"
            ], 406);
        }
        
        $vendorDetails = VendorMaster::find($request->id);

        $vendorDetails->name = is_null($request->name) ? $vendorDetails->name : $request->name;
        $vendorDetails->address = is_null($request->address) ? $vendorDetails->address : $request->address;
        $vendorDetails->city = is_null($request->city) ? $vendorDetails->city : $request->city;
        $vendorDetails->state = is_null($request->state) ? $vendorDetails->state : $request->state;
        $vendorDetails->country = is_null($request->country) ? $vendorDetails->country : $request->country;
        $vendorDetails->pincode = is_null($request->pincode) ? $vendorDetails->pincode : $request->pincode;
        $vendorDetails->email = is_null($request->email) ? $vendorDetails->email : $request->email;
        $vendorDetails->mob_no = is_null($request->mob_no) ? $vendorDetails->mob_no : $request->mob_no;
        $vendorDetails->tin_no = is_null($request->tin_no) ? $vendorDetails->tin_no : $request->tin_no;
        $vendorDetails->gst_no = is_null($request->gst_no) ? $vendorDetails->gst_no : $request->gst_no;
        $vendorDetails->payment_terms = is_null($request->payment_terms) ? $vendorDetails->payment_terms : $request->payment_terms;
        $vendorDetails->payment_method = is_null($request->payment_method) ? $vendorDetails->payment_method : $request->payment_method;
        $vendorDetails->account_no = is_null($request->account_no) ? $vendorDetails->account_no : $request->account_no;
        $vendorDetails->ifsc_code = is_null($request->ifsc_code) ? $vendorDetails->ifsc_code : $request->ifsc_code;
        $vendorDetails->branch = is_null($request->branch) ? $vendorDetails->branch : $request->branch;
        $vendorDetails->account_holder_name = is_null($request->account_holder_name) ? $vendorDetails->account_holder_name : $request->account_holder_name;
        $vendorDetails->currency = is_null($request->currency) ? $vendorDetails->currency : $request->currency;
        $vendorDetails->vendor_type = is_null($request->vendor_type) ? $vendorDetails->vendor_type : $request->vendor_type;
        $vendorDetails->credit_limit = is_null($request->credit_limit) ? $vendorDetails->credit_limit : $request->credit_limit;
        $vendorDetails  = $vendorDetails->save();

        if($vendorDetails){
            return response()->json([
                'status' => "success",
                'message' => "Vendor Updated Successfully"
            ], 200);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "Error in submission!"
            ], 406);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VendorMaster  $vendorMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $vendor = VendorMaster::find($request->id);

        $deleteVendor= $vendor->delete();

        if($deleteVendor){
            return response()->json([
                'status'=> "success",
                'message' => "Vendor Deleted Successfully"
            ], 200);
        }else{
            return response()->json([
                'status'=> "error",
                'message' => "Error In Deletion"
            ], 406);
        }
    }
}
