<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExtratoController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $transfers = Transfer::where("origemId", "=", $id)
            ->orWhere("destinoId", "=", $id)->get();
        return view('extrato.index', compact('transfers'));
    }
}
