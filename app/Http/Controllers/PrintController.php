<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class PrintController extends Controller
{
    public function print(Request $request)
    {
        $type = $request->input('type');
        $time = $request->input('time') ?? '';
        $search = $request->input('search') ?? '';

        switch ($type) {
            case 'laundry':
                $view = 'print.laundry'; 
                break;
            case 'ironing':
                $view = 'print.ironing'; 
                break;
            case 'transaction':
                $view = 'print.transaction'; 
                $data['transactions'] = (new \App\Http\Controllers\TransactionController)->getDataTransaction($time, $search)->get();
                $data['income'] = (new \App\Http\Controllers\TransactionController)->getDataTransaction($time, $search)->sum('price_transaction');
                $data['date'] = $time;
                break;
        }

        $mpdf = new Mpdf();

        $html = view($view, compact('data'))->render();

        $mpdf->WriteHTML($html);

        return $mpdf->Output('laporan-' . $type . '.pdf', 'I');
    }
}
