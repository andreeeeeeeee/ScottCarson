<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TransferController extends Controller
{
    public function index()
    {
        return view('transfer.index');
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $origemId = $user->id;
        $valor = $request->valor;
        $descricao = $request->descricao;
        $destinoId = 0;
        if ($descricao == 'Transferência') {
            $destinoId = DB::table('users')->where('conta', $request->destinoConta)->value('id');
        } elseif ($descricao == 'PIX') {
            $destinoId = DB::table('chaves_pix')->where('chave', $request->chave)->where('tipo', $request->tipo)->value('userId');
        }
        if ($valor <= $user->saldo) {
            Transfer::create([
                'origemId' => $origemId,
                'destinoId' => $destinoId,
                'valor' => $valor,
                'descricao' => $descricao,
            ]);

            $usuarioOrigem = User::find($origemId);
            $saldoAtualOrigem = $usuarioOrigem->saldo - $valor;
            $usuarioOrigem->saldo = $saldoAtualOrigem;
            $usuarioOrigem->save();
            if ($descricao != 'Boleto') {
                $usuarioDestino = User::find($destinoId);
                $saldoAtualDestino = $usuarioDestino->saldo + $valor;
                $usuarioDestino->saldo = $saldoAtualDestino;
                $usuarioDestino->save();
            }
        }
        return view('dashboard');
    }
}
