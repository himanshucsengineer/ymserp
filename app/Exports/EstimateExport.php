<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Events\AfterSheet;

use App\Models\MasterCategory;
use App\Models\GateIn;
use App\Models\PreAdvice;
use App\Models\OutwardOfficer;

use App\Models\MasterLine;
use App\Models\MasterTransport;
use App\Models\InvoiceManagement;
class EstimateExport implements FromCollection, WithHeadings, WithMapping, Responsable, WithTitle, WithEvents, ShouldAutoSize
{

    use Exportable;

    private $requestData;

    public function __construct(array $requestData)
    {
        $this->request = $requestData;
    }

    public function collection(){
        $lineData = MasterLine::where('name',$this->request['line_name'])->whereIn('depo_id',$this->request['depo_id'])->get();
        $lineId = [];
        if(count($lineData)>0){
            foreach($lineData as $lineget){
                array_push($lineId, $lineget->id);
            }
        }

        $startDate =  $this->request['from'];
        $endDate =  $this->request['to'];


        if($this->request['report_type'] == 'ALL'){
            $getInData = GateIn::where([
                ['status','In']
            ])->whereIn('depo_id',$this->request['depo_id'])->whereIn('line_id',$lineId)->whereBetween('inward_date', [$startDate, $endDate])->get();
        
        }else{
            $report_type = $this->request['report_type'];
            $getInData = GateIn::where([
                ['status','In'],
                ['container_type', $report_type]
            ])->whereIn('depo_id',$this->request['depo_id'])->whereIn('line_id',$lineId)->whereBetween('inward_date', [$startDate, $endDate])->get();
        }

        return $getInData;
    }

    public function headings(): array
    {
        return [
            'Container No',
            'Size/Type',
            'In Date',
            'Consignee',
            'Transporter',
            'VehicalNo.',
            'In Source',
            'In Time',
            'Receipt No.',
            'Cash Amount',
            'Status',
            'Gross Weight',
            'Tare Weight',
            'Remark',
            'Vessel',
            'Voyage',
        ];
    }


    public function map($getInData): array{

        if($getInData->consignee_id){
            $consignee = MasterTransport::where('id',$getInData->consignee_id)->first();
            if($consignee){
                $consignee_name = $consignee->name;
            }else{
                $consignee_name = '';
            }
        }else{
            $consignee_name = '';
        }

        if($getInData->transport_id){
            $transporter = MasterTransport::where('id',$getInData->transport_id)->first();
            if($transporter){
                $transporter_name = $transporter->name;
            }else{
                $transporter_name = '';
            }
        }else{
            $transporter_name = '';
        }

        $invoiceData = InvoiceManagement::where([
            ['gate_in_id',$getInData->id],
            ['invoice_type','lolo'],
            ['payment_method','Cash']
            ])->first();

        if($invoiceData){
            if($invoiceData->amount){
                $amount = $invoiceData->amount;
            }else{
                $amount = '';
            }
            $receipt_no = $invoiceData->final_invoice_no;
        }else{
            $amount = '';
            $receipt_no = '';
        }

        $sizeandtype =  $getInData->container_size . ' / ' .  $getInData->sub_type;

        return [
            $getInData->container_no,
            $sizeandtype,
            $getInData->inward_date,
            $consignee_name,
            $transporter_name,
            $getInData->vehicle_nmber,
            $getInData->arrive_from,
            $getInData->inward_time,
            $receipt_no,
            $amount,
            $getInData->status_name,
            $getInData->gross_weight,
            $getInData->tare_weight,
            $getInData->remarks,
            $getInData->vessel_name,
            $getInData->voyage,
        ];
    }

    public function title(): string
    {
        return 'Estimate'; // Set the desired sheet name
    }
    
}