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
class DmrOutExport implements FromCollection, WithHeadings, WithMapping, Responsable, WithTitle, WithEvents, ShouldAutoSize
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
            $gateOutData = GateIn::where([
                ['status','Out']
            ])->whereIn('depo_id',$this->request['depo_id'])->whereIn('line_id',$lineId)->whereBetween('gate_out_date', [$outStartDate, $outEndDate])->get();
            
        }else{
            $report_type = $this->request['report_type'];

            $gateOutData = GateIn::where([
                ['status','Out'],
                ['container_type', $report_type]
            ])->whereIn('depo_id',$this->request['depo_id'])->whereIn('line_id',$lineId)->whereBetween('gate_out_date', [$outStartDate, $outEndDate])->get();
        }

        return $gateOutData;
    }

    public function headings(): array
    {
        return [
            'Container No',
            'Size/Type',
            'In Date',
            'Out Date Time',
            'Shipper',
            'Bkg/Do',
            'Destination',
            'Transporter',
            'Vehical No.',
            'Seal No.',
            'Remarks',
            'Vessel',
            'Voyage',
            'POD',
        ];
    }


    public function map($gateOutData): array{
        $outwardOfficerData = OutwardOfficer::where('gate_in_id',$gateOutData->id)->first();
            $preadvice = PreAdvice::where('id', $outwardOfficerData->pre_advice_id)->first();


            if($outwardOfficerData->transport_id){
                $transporter = MasterTransport::where('id',$outwardOfficerData->transport_id)->first();
                if($transporter){
                    $transporter_name = $transporter->name;
                }else{
                    $transporter_name = '';
                }
            }else{
                $transporter_name = '';
            }

            $sizeandtype = $gateOutData->container_size . ' / ' .$gateOutData->sub_type;

            $outdataFormate[] =[
                $gateOutData->container_no,
                $sizeandtype,
                $gateOutData->inward_date,
                $gateOutData->gate_out_date,
                $preadvice->shipper_name,
                $preadvice->do_no,
                $outwardOfficerData->destination,
                $transporter_name,
                $outwardOfficerData->vhicle_no,
                $outwardOfficerData->seal_no,
                $preadvice->remarks,
                $preadvice->vessel,
                $preadvice->voyage,
                $preadvice->pod,
            ];
    }

    public function title(): string
    {
        return 'Out Movement'; // Set the desired sheet name
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Add header information
                $event->sheet->mergeCells('A1:U1');
                $event->sheet->setCellValue('A1', 'DMR REPORT');
                $event->sheet->mergeCells('A2:U2');
                $event->sheet->setCellValue('A2', 'Out-Movement');
                $event->sheet->mergeCells('A3:U3');
                $event->sheet->setCellValue('A3', 'LineName ' . $this->request['line_name']);
                $event->sheet->mergeCells('A4:U4');
                $event->sheet->setCellValue('A4', 'ReportDate From ' . $this->request['from'] . ' To ' . $this->request['to']);
    



                $event->sheet->getStyle('A1:U1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 13,
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                $event->sheet->getStyle('A2:U2')->applyFromArray([
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

                $event->sheet->getStyle('A3:U4')->applyFromArray([
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
                $event->sheet->getRowDimension(4)->setRowHeight(30);

                $startRow = 5;

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
            $headerRange = 'A' . ($startRow - count($data) - 1) . ':U' . ($startRow - 1);
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
            $dataRange = 'A' . ($startRow - count($data)) . ':U' . ($startRow);
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