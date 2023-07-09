<x-guest-layout>
    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
        <a href="{{ route('dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
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

        <div>
            <x-input-label for="destinoConta" :value="__('Conta de Destino')" />
            <x-text-input id="destinoConta" class="block mt-1 w-full" type="destinoConta" name="destinoConta" required autofocus />
            <x-input-error :messages="$errors->get('destinoConta')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="valor" :value="__('Valor')" />

            <x-text-input id="valor" class="block mt-1 w-full" type="valor" name="valor" required/>

            <x-input-error :messages="$errors->get('valor')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-3">
                {{ __('Enviar') }}
            </x-primary-button>
        </div>
    </form>

    <!-- </div>
        </div>
        </div> -->
    </x-app-layout>
