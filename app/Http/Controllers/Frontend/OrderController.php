<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;


class OrderController extends Controller
{
    public function fetchOrders()
    {
        $userId = Auth::id();

        // Fetch orders of the authenticated user with their associated order items
        // developed by rezhin & soz & shokra 
        $orders = Order::where('user_id', $userId)->with('orderItems')->get();

        // Fetch exchange rate
        $exchangeRate = $this->fetchExchangeRate(config('services.exchange_rate_api.key'));

        return view('frontend.userfront.orders', compact('orders', 'exchangeRate'));
    }

    private function fetchExchangeRate($apiKey)
    {
        // get api response from exchange rate api
        $response = Http::withoutVerifying()->get('https://api.exchangerate-api.com/v4/latest/USD', [
            'access_key' => $apiKey
        ]);
        
         // check if exchange rate is available and return it
        if ($response->successful()) {
            $data = $response->json();
            return $data['rates']['IQD'] ?? null;
        }

        return null;
    }
}
