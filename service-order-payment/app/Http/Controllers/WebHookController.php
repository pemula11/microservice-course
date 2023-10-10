<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentLog;
use Illuminate\Http\Request;


class WebHookController extends Controller
{
    //
    public function midTransHandler(Request $request){
        $data = $request->all();

        $signatureKey = $data['signature_key'];

        $orderId = $data['order_id'];
        $statusCode = $data['status_code'];
        $grossAmount = $data['gross_amount'];
        $serverKey = env('MIDTRANS_SERVER_KEY');

        $mySignatureKey = hash('sha512' ,$orderId.$statusCode.$grossAmount.$serverKey);
        $transactionStatus= $data['transaction_status'];
        $type = $data['payment_type'];
        $fraudStatus = $data['fraud_status'];

        if ($signatureKey !== $mySignatureKey){
            return response()->json([
                'status'=> 'error',
                'message'=> 'invalid signature'
            ], 409);
        }

        $realOrderId = explode('-', $orderId);
        $order = Order::find($realOrderId[0]);

        if (!$order){
            return response()->json([
                'status'=> 'error',
                'message'=> 'order not found'
            ], 404);
        }
        if ($order->status === 'success'){
            return response()->json([
                'status' => 'error',
                'message' => 'operation not permited'
            ], 405);
        }

        if ($transactionStatus == 'capture'){
            if ($fraudStatus == 'accept'){
                    // TODO set transaction status on your database to 'success'
                    // and response with 200 OK
                    $order->status = 'success';
                }
            else if ($fraudStatus == 'challenge'){
                    $order->status = 'challenge';
                }
            } 
        else if ($transactionStatus == 'settlement'){
                // TODO set transaction status on your database to 'success'
                // and response with 200 OK
                $order->status = 'success';
            } 
        else if ($transactionStatus == 'cancel' ||
              $transactionStatus == 'deny' ||
              $transactionStatus == 'expire'){
              // TODO set transaction status on your database to 'failure'
              // and response with 200 OK
              $order->status = 'failure';
            } 
        else if ($transactionStatus == 'pending'){
              // TODO set transaction status on your database to 'pending' / waiting payment
              // and response with 200 OK
              $order->status = 'pending';
            }
            
        $LogData = [
            'status' => $transactionStatus,
            'raw_response' => json_encode($data),
            'order_id' => $realOrderId[0],
            'payment_type' => $type
        ];

        PaymentLog::create($LogData);
        $order->save();

        if ($order->status === 'success'){
            $hasil = createPremiumAccess([
                'user_id' => $order->user_id,
                'course_id' => $order->course_id
            ]);
        }
        
        return response()->json($hasil);
    }
}
