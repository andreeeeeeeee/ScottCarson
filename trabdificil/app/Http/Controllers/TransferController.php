<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;

class TransferController extends Controller
{
    public function index()
    {
        return view('transfer.index');
    }

    public function create(Request $request)
    {
        $user=Auth::user();
        $origemId = $user->id;
        $destinoId = DB::table('users')->where('conta', $request->destinoConta)->value('id');
        ProfileController::atualiza_saldo($origemId, $destinoId, $request->valor);
        Transfer::create([
            'origemId' => $origemId,
            'destinoId' => $destinoId,
            'valor' => $request->valor,
        ]);
        return view('dashboard');
    }
}
