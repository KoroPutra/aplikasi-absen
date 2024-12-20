<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Selamat datang kembali di halaman admin') }}
                    </h3>

                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Di halaman ini, Anda dapat mengelola data absensi dan melakukan konfigurasi aplikasi') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>