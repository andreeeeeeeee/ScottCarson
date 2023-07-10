<x-guest-layout>
    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
        <a href="{{ route('dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Painel de controle</a>
        @else
        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cadastrar</a>
        @endif
        @endauth
    </div>
    @endif
    <form method="POST" action="{{ route('transfer.create') }}">
        @csrf

        <!-- Número -->
        <div>
            <x-input-label for="numeroBoleto" :value="__('Número do Boleto')" />
            <x-text-input id="numeroBoleto" class="block mt-1 w-full" type="text" name="numeroBoleto" required autofocus />
            <x-input-error :messages="$errors->get('numeroBoleto')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="valor" :value="__('Valor')" />
            <x-text-input id="valor" class="block mt-1 w-full" type="text" name="valor" required />
            <x-input-error :messages="$errors->get('valor')" class="mt-2" />
        </div>

        <div class="mt-4 hidden">
            <x-input-label for="descricao" :value="__('descricao')" />
            <x-text-input id="descricao" class="block mt-1 w-full" type="hidden" name="descricao" required value="Boleto" />
            <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-3">
                {{ __('Pagar') }}
            </x-primary-button>
        </div>
    </form>
    </x-app-layout>
