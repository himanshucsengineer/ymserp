<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

use App\Exports\DmrInExport;
use App\Exports\DmrOutExport;
use App\Exports\DmrInventoryExport;

class DmrExport implements WithMultipleSheets
{

    use Exportable;

    private $requestData;

    public function __construct(array $requestData)
    {
        $this->request = $requestData;
    }

    public function sheets(): array
    {
        $sheets = [
            'In Movement' => new DmrInExport($this->request),
            'Out Movement' => new DmrOutExport($this->request),
            'Inventory' => new DmrInventoryExport($this->request),
        ];

        return $sheets;
    }
}