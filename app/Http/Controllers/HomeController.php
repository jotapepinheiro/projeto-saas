<?php

namespace Loja\Http\Controllers;

use Illuminate\Http\Request;
use Hyn\Tenancy\Environment;
use Loja\Website;

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

    public function index()
    {
        app(Environment::class)->tenant();

        return view('home');
    }

    public function invoice(Request $request, $invoiceId)
    {
        $website = new Website;
        app(Environment::class)->tenant();
        return $website->downloadInvoice($invoiceId, [
            'vendor' => 'Your Company',
            'product' => 'Your Product',
        ]);
    }
}
