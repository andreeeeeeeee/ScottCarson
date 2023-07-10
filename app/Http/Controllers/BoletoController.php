<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoletoController extends Controller
{
    public function index() {
        return view('boleto.index');
    }
}
