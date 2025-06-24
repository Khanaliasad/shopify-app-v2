<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopifyWebhookController;

Route::middleware(['verify.shopify'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['verify.shopify'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

Route::get('/billing/callback', function () {
    $shop = \Shopify\Models\Shop::where('shopify_domain', request('shop'))->first();
    $charge = new \Shopify\Services\Billing\RecurringCharge($shop);

    $activated = $charge->activate(request('charge_id'));
    if ($activated) {
        return redirect('/')->with('success', 'App installed and billing activated');
    }
    return redirect('/')->with('error', 'Billing activation failed');
});


Route::post('/shopify/webhook/customers/data_request', [ShopifyWebhookController::class, 'dataRequest']);
Route::post('/shopify/webhook/customers/redact', [ShopifyWebhookController::class, 'customerRedact']);
Route::post('/shopify/webhook/shop/redact', [ShopifyWebhookController::class, 'shopRedact']);
