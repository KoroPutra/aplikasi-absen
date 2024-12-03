<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">APLIKASI ABSEN</h1>
                    <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
                        <!-- Left Section: User Information -->
                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md flex-1">
                            <div class="flex flex-col items-center">
                                <div class="w-24 h-24 bg-blue-500 text-white text-4xl flex items-center justify-center rounded-full mb-4">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <h2 class="text-lg font-semibold">{{ auth()->user()->name }}</h2>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ auth()->user()->nip }}</p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ auth()->user()->email }}</p>
                            </div>
                        </div>

                        <!-- Right Section: Absen Form -->
                        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md flex-1">
                            <form action="{{ route('absen.submit') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                <!-- Jenis Absen -->
                                <div>
                                    <label for="absen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis Absen</label>
                                    <select name="absen" id="absen" class="bg-gray-50 dark:bg-gray-800 border border-gray-300 text-gray-900 dark:text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                        <option value="FWA">FWA</option>
                                        <option value="WFO">WFO</option>
                                    </select>
                                </div>

                                <!-- Waktu -->
                                <div>
                                    <label for="jam" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Waktu</label>
                                    <input type="time" name="jam" id="jam" value="{{ \Carbon\Carbon::now()->format('H:i') }}" class="bg-gray-50 dark:bg-gray-800 border border-gray-300 text-gray-900 dark:text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>