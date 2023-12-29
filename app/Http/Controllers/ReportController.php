<?php

namespace App\Http\Controllers;

use App\Models\PTI;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Validator;
use \stdClass;
use App\Models\GateIn;

use App\Models\MasterLine;
use App\Models\MasterTransport;
use App\Models\InvoiceManagement;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use Helpers;

    public function container_report_view(){
        return view('report.container');
    }
    
    public function dmr_report_view(){
        return view('report.dmr');

    }

    public function getDmrReport(Request $request){

        $lineData = MasterLine::where('name',$request->line_name)->whereIn('depo_id',$request->depo_id)->get();
        $lineId = [];
        if(count($lineData)>0){
            foreach($lineData as $lineget){
                array_push($lineId, $lineget->id);
            }
        }

        $startDate =  $request->from;
        $endDate =  $request->to;
        
        if($request->report_type == 'ALL'){
            $getInData = GateIn::where([
                ['status','In']
            ])->whereIn('depo_id',$request->depo_id)->whereIn('line_id',$lineId)->whereBetween('inward_date', [$startDate, $endDate])->get();
            
            $inventryData =  GateIn::where([
                ['status','!=','Out']
            ])->whereIn('depo_id',$request->depo_id)->whereIn('line_id',$lineId)->get();
        
        }else{
            $getInData = GateIn::where([
                ['status','In'],
                ['container_type', $request->report_type]
            ])->whereIn('depo_id',$request->depo_id)->whereIn('line_id',$lineId)->whereBetween('inward_date', [$startDate, $endDate])->get();
                
            $inventryData =  GateIn::where([
                ['status','!=','Out'],
                ['container_type', $request->report_type]
            ])->whereIn('depo_id',$request->depo_id)->whereIn('line_id',$lineId)->get();
        }

        $indataFormate = [];
        $inventoryFormate = [];

        foreach($getInData as $indata){
            if($indata->consignee_id){
                $consignee = MasterTransport::where('id',$indata->consignee_id)->first();
                if($consignee){
                    $consignee_name = $consignee->name;
                }else{
                    $consignee_name = '';
                }
            }else{
                $consignee_name = '';
            }

            if($indata->transport_id){
                $transporter = MasterTransport::where('id',$indata->transport_id)->first();
                if($transporter){
                    $transporter_name = $transporter->name;
                }else{
                    $transporter_name = '';
                }
            }else{
                $transporter_name = '';
            }

            $invoiceData = InvoiceManagement::where([
                ['gate_in_id',$indata->id],
                ['invoice_type','lolo'],
                ['payment_method','Cash']
                ])->first();

            if($invoiceData){
                $amount = $invoiceData->amount;
                $receipt_no = $invoiceData->final_invoice_no;
            }

            $indataFormate[] =[
                'container_no' => $indata->container_no,
                'container_size' => $indata->container_size,
                'sub_type' => $indata->sub_type,
                'inward_date' => $indata->inward_date,
                'vehicle_number' => $indata->vehicle_number,
                'arrive_from' => $indata->arrive_from,
                'inward_time' => $indata->inward_time,
                'status_name' => $indata->status_name,
                'gross_weight' => $indata->gross_weight,
                'tare_weight' => $indata->tare_weight,
                'remarks' => $indata->remarks,
                'consignee_name' => $consignee_name,
                'transporter_name' => $transporter_name,
                'amount' => $amount,
                'receipt_no' => $receipt_no,
            ];
        }

        foreach($inventryData as $inventory){

            if($inventory->consignee_id){
                $consignee = MasterTransport::where('id',$inventory->consignee_id)->first();
                if($consignee){
                    $consignee_name = $consignee->name;
                }else{
                    $consignee_name = '';
                }
                
            }else{
                $consignee_name = '';
            }

            if($inventory->transport_id){
                $transporter = MasterTransport::where('id',$inventory->transport_id)->first();
                if($transporter){
                    $transporter_name = $transporter->name;
                }else{
                    $transporter_name = '';
                }
            }else{
                $transporter_name = '';
            }

            $specifiedDate = new \DateTime($inventory->inward_date);

            // Current date
            $currentDate = new \DateTime();
            
            // Calculate the difference in days
            $interval = $currentDate->diff($specifiedDate);
            $daysDifference = $interval->days;

            $inventoryFormate[] =[
                'container_no' => $inventory->container_no,
                'container_size' => $inventory->container_size,
                'sub_type' => $inventory->sub_type,
                'inward_date' => $inventory->inward_date,
                'vehicle_number' => $inventory->vehicle_number,
                'transporter_name' => $transporter_name,
                'status_name' => $inventory->status_name,
                'remarks' => $inventory->remarks,
                'consignee_name' => $consignee_name,
                'no_of_day' => $daysDifference
            ];
        }

        $finalData = array(
            'in_movment' => $indataFormate,
            'inventory' => $inventoryFormate
        );

        return $finalData;

       
    }

  
}
