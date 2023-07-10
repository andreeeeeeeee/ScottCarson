<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel de controle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-4 grid-cols-3 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <button class="p-2 mt-4 text-gray-900 dark:text-gray-100"><a href="{{ route('extrato.index') }}"> {{ __("Extrato") }} </a></button>
                <button class="p-2 text-gray-900 dark:text-gray-100"><a href="{{ route ('pagamentos') }}"> {{ __("Pagamentos") }} </a></button>
                <button class="p-2 mb-4 text-gray-900 dark:text-gray-100"><a href="{{ route('transfer.index') }}"> {{ __("Trasferências") }} </a></button>
            </div>
        </div>
    </div>
</x-app-layout>
