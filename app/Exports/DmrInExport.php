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
class DmrInExport implements FromCollection, WithHeadings, WithMapping, Responsable, WithTitle, WithEvents, ShouldAutoSize
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
        return 'In Movement'; // Set the desired sheet name
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Add header information
                $event->sheet->mergeCells('A1:P1');
                $event->sheet->setCellValue('A1', 'BHAVANI SHIPPING SERVICES (I) PVT. LTD.');
                $event->sheet->mergeCells('A2:P2');
                $event->sheet->setCellValue('A2', 'ADM OFF: 601/602/603, V-Times Square, Plot no:- 03, Sector-15, CBD Belapur, Navi Mumbai – 400614.');
                $event->sheet->mergeCells('A3:P3');
                $event->sheet->setCellValue('A3', 'Tel:- 67106474  Telfax:- 67106473  Email :- info@bhavani.net.in');
                $event->sheet->mergeCells('A4:P4');
                $event->sheet->setCellValue('A4', 'DMR REPORT');
                $event->sheet->mergeCells('A5:P5');
                $event->sheet->setCellValue('A5', 'In-Movement');
                $event->sheet->mergeCells('A6:P6');
                $event->sheet->setCellValue('A6', 'LineName ' . $this->request['line_name']);
                $event->sheet->mergeCells('A7:P7');
                $event->sheet->setCellValue('A7', 'ReportDate From ' . $this->request['from'] . ' To ' . $this->request['to']);
    

                $event->sheet->getStyle('A1:P1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 17,
                        'color' => ['rgb' => 'dc3545'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // Apply formatting to the header information
                $event->sheet->getStyle('A2:P3')->applyFromArray([
                    'font' => [
                        'bold' => false,
                        'size' => 12,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $event->sheet->getStyle('A4:P4')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 13,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $event->sheet->getStyle('A5:P5')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                        'color' => ['rgb' => '3498db'],

                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $event->sheet->getStyle('A6:P7')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 13,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // Set row height for the header information
                $event->sheet->getRowDimension(1)->setRowHeight(30);
                $event->sheet->getRowDimension(2)->setRowHeight(30);
                $event->sheet->getRowDimension(3)->setRowHeight(30);
                $event->sheet->getRowDimension(5)->setRowHeight(30);
                $event->sheet->getRowDimension(6)->setRowHeight(30);
                $event->sheet->getRowDimension(7)->setRowHeight(30);
    
                $startRow = 8;

            // Add headings
            $headings = $this->headings();
            $columnIndex = 'A';
            foreach ($headings as $heading) {
                $event->sheet->setCellValue($columnIndex++ . $startRow, $heading);
            }

            // Increment the start row for data
            $startRow++;

            // Set the data in the sheet manually using the map function
            $data = $this->collection()->map(function ($row) {
                return $this->map($row);
            });

            foreach ($data as $row) {
                $columnIndex = 'A';
                foreach ($row as $value) {
                    $event->sheet->setCellValue($columnIndex++ . $startRow, $value);
                }
                $startRow++;
            }

            // Apply formatting to the header information
            $headerRange = 'A' . ($startRow - count($data) - 1) . ':P' . ($startRow - 1);
            $event->sheet->getStyle($headerRange)->applyFromArray([
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'], // White text color
                ],
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                ],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => '3498db'], // Blue background color
                ],
            ]);

            // Additional formatting or customization if needed
            // For example, you can set the background color for the data rows:
            $dataRange = 'A' . ($startRow - count($data)) . ':P' . ($startRow);
            $event->sheet->getStyle($dataRange)->applyFromArray([
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'color' => ['argb' => 'ffffff'], // Yellow background color for data rows
                ],
                'font' => [
                    'bold' => false,
                    'color' => ['rgb' => '000000'], // White text color
                ],
            ]);
            },
        ];
    }
    
}