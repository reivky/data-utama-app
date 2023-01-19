<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function store(Request $request)
    {
        $client = new Client();
        $response = $client->post('https://sandbox.saebo.id/api/v1/transactions', [
            'headers' => [
                'X-API-KEY' => 'DATAUTAMA',
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
            'form_params' => [
                'quantity' => '2',
                'price' => '2',
                'payment_amount' => '20',
                // 'quantity' => $this->quantity,
                // 'price' => $this->price,
                // 'payment_amount' => $this->payment_amount,
            ]
        ]);
        return $response->getBody()->getContents();
    }
}
