<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function genrateastimate()
    {
        $data = ['title' => 'Sample PDF'];
        $pdf = PDF::loadView('pdf.astimate', $data);

        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isPhpEnabled' => true,
            // 'isRemoteEnabled' => true
        ]);

        return $pdf->download('astimate.pdf');
    }
}
