<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Routing\Controller;

class ShopifyWebhookController extends Controller
{
    public function dataRequest(Request $request)
    {
        Log::info('Data request webhook received', $request->all());
        return response()->json(['status' => 'received'], 200);
    }

    public function customerRedact(Request $request)
    {
        Log::info('Customer redact webhook received', $request->all());
        return response()->json(['status' => 'received'], 200);
    }

    public function shopRedact(Request $request)
    {
        Log::info('Shop redact webhook received', $request->all());
        return response()->json(['status' => 'received'], 200);
    }
}

