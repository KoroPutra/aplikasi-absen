<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Absen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>APLIKASI ABSEN </h1>
                    <div class="flex flex-col">
                        <form action="{{route('absen.update', $absen->id)}}" method="POST" class="space-y-4">
                            @csrf
                            <div class="flex flex-col space-y-1">
                                <label for="nama" class="text-sm font-medium text-gray-700 dark:text-gray-300">Nama</label>
                                <input type="text" name="nama" value="{{$absen->nama}}" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 text-gray-900 dark:text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>
                            <div class="flex flex-col space-y-1">
                                <label for="nip" class="text-sm font-medium text-gray-700 dark:text-gray-300">NIP</label>
                                <input type="number" name="nip" value="{{$absen->nip}}" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 text-gray-900 dark:text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>
                            <div class="flex flex-col space-y-1">
                                <label for="absen" class="text-sm font-medium text-gray-700 dark:text-gray-300">Absen</label>
                                <select name="absen" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 text-gray-900 dark:text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                    <option value="wfh" {{ $absen->absen == 'wfh' ? 'selected' : '' }}>WFH</option>
                                    <option value="wfo" {{ $absen->absen == 'wfo' ? 'selected' : '' }}>WFO</option>
                                </select>
                            </div>
                            <div class="flex flex-col space-y-1">
                                <label for="jam" class="text-sm font-medium text-gray-700 dark:text-gray-300">Jam</label>
                                <input type="datetime-local" name="jam" value="{{ $absen->jam }}" class="bg-gray-50 dark:bg-gray-700 border border-gray-300 text-gray-900 dark:text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>