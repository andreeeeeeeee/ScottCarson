<?php

use App\Models\User;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel de controle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-4 grid-cols-3 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="table-auto border-collapse border border-slate-500 text-gray-500 dark:text-gray-400">
                    <thead>
                        <tr>
                            <th class="border border-slate-600">#</th>
                            <th class="border border-slate-600">Destino/Origem</th>
                            <th class="border border-slate-600">Valor</th>
                            <th class="border border-slate-600">Tipo</th>
                            <th class="border border-slate-600">Data e hora</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transfers as $transfer)
                        <tr>
                            <th class="border border-slate-600">{{ $transfer->id }}</th>
                            @if ($transfer->destinoId == Auth::user()->id)
                            <td class="border border-slate-600">{{ User::find($transfer->origemId)->name }}</td>
                            <td class="border border-slate-600">+ R$ {{ $transfer->valor }}</td>
                            @else
                            <td class="border border-slate-600">{{ User::find($transfer->destinoId)->name }}</td>
                            <td class="border border-slate-600">- R$ {{ $transfer->valor }}</td>
                            @endif
                            <td class="border border-slate-600">{{ $transfer->descricao }}</td>
                            <td class="border border-slate-600">{{ $transfer->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
