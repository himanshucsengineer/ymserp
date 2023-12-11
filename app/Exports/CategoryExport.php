<?php
namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\CategoryMaster;

class CategoryExport implements FromCollection, WithHeadings, WithMapping, Responsable
{

    use Exportable;

    public function collection(){
        return CategoryMaster::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
        ];
    }


    public function map($client): array{

        return [
            $client->id,
            $client->name,
        ];
    }
}