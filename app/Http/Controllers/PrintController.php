<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;

class PrintController extends Controller
{
    public function print(Request $request)
    {
        $type = $request->input('type'); 

        switch ($type) {
            case 'laundry':
                $view = 'print.laundry'; 
                break;
            case 'ironing':
                $view = 'print.ironing'; 
                break;
            case 'transaction':
                $view = 'print.transaction'; 
                break;
        }

        $mpdf = new Mpdf();

        $html = view($view)->render();

        $mpdf->WriteHTML($html);

        return $mpdf->Output('laporan-' . $type . '.pdf', 'I');
    }
}
