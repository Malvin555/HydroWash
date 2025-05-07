<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Carbon\Carbon;
use App\Models\Ironing;
use App\Models\Laundry;
use App\Models\Transaction;
use Illuminate\Support\Str;
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
        $serviceName = $request->input('service');

        switch ($type) {
            case 'laundry':
                $view = 'print.laundry';
                $data = $this->getServiceTableDataToPrint(LaundryController::class, 'getDataLaundry', $search, $status, $order);
                break;
            case 'ironing':
                $view = 'print.ironing';
                $data = $this->getServiceTableDataToPrint(IroningController::class, 'getDataIroning', $search, $status, $order);
                break;
            case 'transaction':
                $view = 'print.transaction';
                $data = $this->getTransactionDataToPrint($time, $search);
                break;
            case 'laundry-receipt':
                $view = 'print.receipt.laundry';
                $data = $this->getServiceReceiptData($serviceName);
                break;
            case 'ironing-receipt':
                $view = 'print.receipt.ironing';
                $data = $this->getServiceReceiptData($serviceName);
                break;
            case 'transaction-receipt':
                $view = 'print.receipt.transaction';
                $data = $this->getTransactionReceiptData($serviceName);;
                break;
        }

        $mpdf = new Mpdf();

        $html = view($view, compact('data'))->render();

        $mpdf->WriteHTML($html);

        return $mpdf->Output('laporan-' . $type . '.pdf', 'I');
    }

    public function getServiceTableDataToPrint($controller, $method, $search, $status = null, $order = null)
    {
        $dataCollection = (new $controller)->$method($search, $status, $order, true);
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

    public function getTransactionDataToPrint($time, $search)
    {
        $data = [
            'transactions' => (new TransactionController)->getDataTransaction($time, $search)->get(),
            'income' => (new TransactionController)->getDataTransaction($time, $search)->sum('price_transaction'),
            'date' => $time
        ];

        return $data;
    }

    public function getTransactionReceiptData($serviceName)
    {
        [$model, $serviceType, $serviceName] = (new TransactionController)->getModelAndService($serviceName);

        $serviceModel = $model::where("name_{$serviceType}", $serviceName)->firstOrFail();
        $data = $serviceModel->transaction()->first();

        return $data;
    }

    public function getServiceReceiptData($serviceName)
    {
        [$model, $serviceType, $serviceName] = (new TransactionController)->getModelAndService($serviceName);

        $data = $model::with('orderItems.itemType')
            ->where("name_{$serviceType}", $serviceName)
            ->firstOrFail();

        $transaction = $data->transaction()->select('id', 'created_at')->first();
        $data->receipt_no = Str::upper(Str::substr($serviceType, 0, 2))
            . '-'
            . Carbon::parse($transaction->created_at)->format('Ymd')
            . '-'
            . str_pad($transaction->id, 3, '0', STR_PAD_LEFT);

        $data->price_total = $data->price_ironing ?? $data->price_laundry;
        $data->delivery_fee = $data->retrieval_method === 'delivery' ? 20000 : 0;

        $data->sub_total = $data->retrieval_method === 'delivery' 
            ? ($data->price_total - $data->delivery_fee) / 1.1 
            : $data->price_total;
        $data->tax =$data->retrieval_method === 'delivery' 
            ? $data->sub_total * 0.1
            : 0;
            
        $data->created_at = $transaction->created_at;

        return $data;
    }
}
