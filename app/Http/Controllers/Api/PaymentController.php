<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PayRequest;
use App\Models\Payment;
use App\Services\Payments\PaymentFactory;
use App\Services\Payments\PaymentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function pay(PayRequest $request): JsonResponse
    {
        try {
            $paymentMethod = PaymentFactory::create($request->method);
            $service = new PaymentService($paymentMethod);
            $resultMessage = $service->process((float)$request->amount);

            $payment = Payment::create([
                'method' => $request->method,
                'amount' => $request->amount,
                'status' => 'success',
            ]);

            return response()->json([
                'message' => $resultMessage,
                'payment' => $payment,
            ], 200);
        } catch (\Throwable $e) {
            Log::error('Payment error : ' . $e->getMessage(), [
                'method' => $request->method,
                'amount' => $request->amount,
                'status' => 'failed',
            ]);

            return response()->json([
                'message' => 'Payment failed: ' . $e->getMessage(),
            ], 400);
        }
    }
}
