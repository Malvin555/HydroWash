<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\IroningController;
use App\Http\Controllers\TransactionController;
use Carbon\Carbon;

class PrintController extends Controller
{
    public function print(Request $request)
    {
        $type = $request->input('type');
        $time = $request->input('time') ?? '';
        $search = $request->input('search') ?? '';
        $status = $request->input('status') ?? '';
        $order = $request->input('order') ?? 'desc';
        
        switch ($type) {
            case 'laundry':
                $view = 'print.laundry'; 
                break;
            case 'ironing':
                $view = 'print.ironing';
                $data = $this->getDataIroningToPrint($search, $status, $order);
                break;
            case 'transaction':
                $view = 'print.transaction'; 
                $data = $this->getDataTransactionToPrint($time, $search);
                break;
        }

        $mpdf = new Mpdf();

        $html = view($view, compact('data'))->render();

        $mpdf->WriteHTML($html);

        return $mpdf->Output('laporan-' . $type . '.pdf', 'I');
    }

    public function getDataIroningToPrint($search, $status, $order)
    {
        $ironing = (new IroningController)->getDataIroning($search, $status, $order);
        $dates = $ironing->pluck('created_at');
        $minDate = $dates->min();
        $maxDate = $dates->max();
        $time = '-';

        if ($minDate && $maxDate) {
            $minFormatted = Carbon::parse($minDate)->format('d-m-Y');
            $maxFormatted = Carbon::parse($maxDate)->format('d-m-Y');

            $time = $minFormatted === $maxFormatted ? $minFormatted : $minFormatted . ' - ' . $maxFormatted;
        }

        $data = [
            'ironings' => $ironing->get(),
            'time' => $time,
        ];

        return $data;
    }

    public function getDataTransactionToPrint($time, $search)
    {
        $data = [
            'transactions' => (new TransactionController)->getDataTransaction($time, $search)->get(),
            'income' => (new TransactionController)->getDataTransaction($time, $search)->sum('price_transaction'),
            'date' => $time
        ];

        return $data;
    }
}
