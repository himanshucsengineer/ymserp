<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\MasterCategory;
use App\Models\GateIn;
use App\Models\PreAdvice;
use App\Models\OutwardOfficer;

use App\Models\MasterLine;
use App\Models\MasterTransport;
use App\Models\InvoiceManagement;
class DmrInventoryExport implements FromCollection, WithHeadings, WithMapping, Responsable, WithTitle
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
        $outStartDate = $startDate . ' 00:00:00';
        $outEndDate = $endDate . ' 23:59:59';

        if($this->request['report_type'] == 'ALL'){
            $inventryData =  GateIn::where([
                ['status','!=','Out']
            ])->whereIn('depo_id',$this->request['depo_id'])->whereIn('line_id',$lineId)->get();
           
        }else{
            $report_type = $this->request['report_type'];

            $inventryData =  GateIn::where([
                ['status','!=','Out'],
                ['container_type', $report_type]
            ])->whereIn('depo_id',$this->request['depo_id'])->whereIn('line_id',$lineId)->get();

           
        }

        return $inventryData;
    }

    public function headings(): array
    {
        return [
            'Container No',
            'Size',
            'Type',
            'In Date',
            'Transporter',
            'Vehical No.',
            'Status',
            'Consignee',
            'Remarks',
            'Days',
        ];
    }


    public function map($inventryData): array{
        if($inventryData->consignee_id){
            $consignee = MasterTransport::where('id',$inventryData->consignee_id)->first();
            if($consignee){
                $consignee_name = $consignee->name;
            }else{
                $consignee_name = '';
            }
            
        }else{
            $consignee_name = '';
        }

        if($inventryData->transport_id){
            $transporter = MasterTransport::where('id',$inventryData->transport_id)->first();
            if($transporter){
                $transporter_name = $transporter->name;
            }else{
                $transporter_name = '';
            }
        }else{
            $transporter_name = '';
        }

        $specifiedDate = new \DateTime($inventryData->inward_date);

        // Current date
        $currentDate = new \DateTime();
        
        // Calculate the difference in days
        $interval = $currentDate->diff($specifiedDate);
        $daysDifference = $interval->days;

        return [
            $inventryData->container_no,
            $inventryData->container_size,
            $inventryData->sub_type,
            $inventryData->inward_date,
            $transporter_name,
            $inventryData->vehicle_number,
            $inventryData->status_name,
            $consignee_name,
            $inventryData->remarks,
            $daysDifference
        ];
    }

    public function title(): string
    {
        return 'Inventory'; // Set the desired sheet name
    }
}