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
            <div class="grid gap-4 grid-rows-2 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <button class="p-2 mt-4 text-gray-900 dark:text-gray-100"><a href="{{ route('pix.create') }}"> {{ __("Adicionar chave") }} </a></button>
                <button class="p-2 mt-4 text-gray-900 dark:text-gray-100"><a href="{{ route('pix.random') }}"> {{ __("Gerar chave aleatória") }} </a></button>
                <table class="table-auto border-collapse border border-slate-500 text-gray-500 dark:text-gray-400">
                    <thead>
                        <tr>
                            <th class="border border-slate-600">{{ __('#') }}</th>
                            <th class="border border-slate-600">{{ __('Chave') }}</th>
                            <th class="border border-slate-600">{{ __('Tipo') }}</th>
                            <th class="border border-slate-600">{{ __('Ações') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($chaves as $chave)
                        <tr>
                            <th class="border border-slate-600">{{ $chave->id }}</th>
                            <td class="border border-slate-600">{{ $chave->chave }}</td>
                            <td class="border border-slate-600">{{ $chave->tipo }}</td>
                            <td class="border border-slate-600">
                                @if ($chave->tipo != 'Aleatória')
                                <a href="{{ route('pix.edit', $chave->id) }}">{{ __('Editar') }}</a>
                                @endif
                                <form action="{{ route('pix.destroy', $chave->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ __('Excluir') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
