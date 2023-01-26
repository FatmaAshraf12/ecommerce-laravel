<?php

namespace App\Http\Controllers;

use App\Http\Services\FatoorahServices;
use App\Models\Transaction;
use Illuminate\Http\Request;

class FatoorahController extends Controller
{
    private $service;
    public  function __construct(FatoorahServices $service)
    {
        $this->service = $service;
    }

    public function payOrder($name,  $email, $order_id, $total)
    {
        $data = [
            'CustomerName' => "$name",
            'NotificationOption' => 'Lnk',
            'InvoiceValue' => $total,
            'CustomerEmail' => "$email",
            'CallBackUrl' => 'http://127.0.0.1:8000/api/callback',
            'ErrorUrl' => 'http://127.0.0.1:8000/api/erorr',
            'Language' => 'en',
            'DisplayCurrencyIso' => 'Egp',
        ];

        $response =  $this->service->sendPayment($data);
        $InvoiceId = $response['Data']['InvoiceId'];
        $paymentURL =  $response['Data']['InvoiceURL'];
        Transaction::create([
            'user_id' => 1,
            'order_id' => $order_id,
            'invoice_id' => $InvoiceId,
            'mode' => 'fatora'
        ]);

        return redirect($paymentURL);
    }

    public function callback(Request $request)
    {
        $paymentId = $request->paymentId;
        $data = [];
        $data['Key'] = $paymentId;
        $data['KeyType'] = 'paymentId';
        $res = $this->service->getPaymentStatus($data);
        $status = $res['Data']['InvoiceStatus'];
        $InvoiceId = $res['Data']['InvoiceId'];

        Transaction::where('invoice_id', $InvoiceId)->update(['status' => $status]);
        return redirect('/');
    }

    public function error(Request $request)
    {
        dd($request);
    }
}
