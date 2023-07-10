<?php

namespace App\Http\Controllers;

use App\Models\Pix;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PixController extends Controller
{
    public function index()
    {
        return view('pix.index');
    }

    public function create() {
        return view('pix.create');
    }

    public function store(Request $request) {
        Pix::create([
            'userId' => Auth::user()->id,
            'chave' => $request->chave,
            'tipo' => $request->tipo,
        ]);
        return Redirect::route('pix.show');
    }

    public function edit(Pix $pix){
        return view('pix.edit', compact('pix'));
    }

    public function update(Request $request, Pix $pix) {
        $pix->chave = $request->chave;
        $pix->save();
        return Redirect::route('pix.show');
    }

    public function destroy(Pix $pix) {
        $pix->delete();
        return Redirect::route('pix.show');
    }

    public function show() {
        $id = Auth::user()->id;
        $chaves = Pix::where("userId", "=", $id)->get();
        return view('pix.show', compact('chaves'));
    }

    public function random() {
        $chave = Controller::genRand(8).'-'.Controller::genRand(4).'-'.Controller::genRand(4).'-'.Controller::genRand(4).'-'. Controller::genRand(12);
        Pix::create([
            'userId' => Auth::user()->id,
            'chave' => $chave,
            'tipo' => 'Aleatória',
        ]);
        return Redirect::route('pix.show');
    }

    public function pagar() {
        return view('pix.pagar');
    }
}
