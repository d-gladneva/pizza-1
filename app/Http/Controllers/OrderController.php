<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Mail\OrderReceived;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    /**
     * Sending Order by Mail.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $emails = array_filter(settings('order_email'));
        $orderData = $request->all();
        $failures = 0;

        foreach ($emails as $email) {
            Mail::to($email)->send(new OrderReceived($orderData));
            $failures += count(Mail::failures());
        }

        if ($failures > 0) {
            return response()->json([ 'status' => 'error' ]);
        }
        else {
            return response()->json([ 'status' => 'success' ]);
        }
    }
}
