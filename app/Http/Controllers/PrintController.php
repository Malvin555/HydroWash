<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\IroningController;
use App\Http\Controllers\LaundryController;
use App\Http\Controllers\TransactionController;

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
                $data = $this->getDataToPrint(LaundryController::class, 'getDataLaundry', $search, $status, $order);
                break;
            case 'ironing':
                $view = 'print.ironing';
                $data = $this->getDataToPrint(IroningController::class, 'getDataIroning', $search, $status, $order);
                break;
            case 'transaction':
                $view = 'print.transaction'; 
                $data = $this->getDataTransactionToPrint($time, $search);
                break;
            case 'laundryReceipt':
                $view = 'print.receipt.laundry'; 
                $data = [];
                break;
            case 'ironingReceipt':
                $view = 'print.receipt.ironing'; 
                $data = [];
                break;
            case 'transactionReceipt':
                $view = 'print.receipt.transaction'; 
                $data = [];
                break;
        }

        $mpdf = new Mpdf();

        $html = view($view, compact('data'))->render();

        $mpdf->WriteHTML($html);

        return $mpdf->Output('laporan-' . $type . '.pdf', 'I');
    }

    public function getDataToPrint($controller, $method, $search, $status = null, $order = null)
    {
        $dataCollection = (new $controller)->$method($search, $status, $order);
        $dates = $dataCollection->pluck('created_at');
        $minDate = $dates->min();
        $maxDate = $dates->max();
        $time = '-';

        if ($minDate && $maxDate) {
            $minFormatted = Carbon::parse($minDate)->format('d-m-Y');
            $maxFormatted = Carbon::parse($maxDate)->format('d-m-Y');

            $time = $minFormatted === $maxFormatted ? $minFormatted : $minFormatted . ' - ' . $maxFormatted;
        }

        $data = [
            'items' => $dataCollection->get(),
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
