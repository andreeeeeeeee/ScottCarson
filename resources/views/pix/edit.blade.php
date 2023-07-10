<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel de controle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form method="POST" action="{{ route('pix.update', $pix->id) }}">
                    @csrf

                    <!-- Chave -->
                    <div>
                        <x-input-label for="chave" :value="__('Chave')" />
                        <x-text-input id="chave" class="block mt-1 w-full" type="text" name="chave" required autofocus value="{{ $pix->chave }}" />
                        <x-input-error :messages="$errors->get('chave')" class="mt-2" />
                    </div>

                    <!-- Tipo -->
                    <div class="mt-4">
                        <x-input-label for="tipo" :value="__('Tipo')" />
                        <select id="tipo" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm block mt-1 w-full" type="text" name="tipo" required disabled>
                            @if ($pix->tipo == 'CPF')
                            <option :value="__('CPF')" selected>{{ __('CPF') }}</option>
                            <option :value="__('Celular')">{{ __('Celular') }}</option>
                            <option :value="__('Email')">{{ __('Email') }}</option>
                            @elseif ($pix->tipo == 'Celular')
                            <option :value="__('CPF')">{{ __('CPF') }}</option>
                            <option :value="__('Celular')" selected>{{ __('Celular') }}</option>
                            <option :value="__('Email')">{{ __('Email') }}</option>
                            @else
                            <option :value="__('CPF')">{{ __('CPF') }}</option>
                            <option :value="__('Celular')">{{ __('Celular') }}</option>
                            <option :value="__('Email')" selected>{{ __('Email') }}</option>
                            @endif
                        </select>
                        <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Editar') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
