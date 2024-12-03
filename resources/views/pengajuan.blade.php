<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Form Pengajuan') }}
        </h2>
    </x-slot>

    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">Form Pengajuan</h1>
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
                            <form action="{{ route('pengajuan.submit') }}" method="POST" class="space-y-4">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                                <!-- Jenis Absen -->
                                <div>
                                    <label for="pengajuan" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Jenis Pengajuan</label>
                                    <select name="pengajuan" id="pengajuan" class="bg-gray-50 dark:bg-gray-800 border border-gray-300 text-gray-900 dark:text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                        <option value="CUTI">Cuti</option>
                                        <option value="SAKIT">Sakit</option>
                                    </select>
                                </div>
                                <!-- Deskripsi -->
                                <div>
                                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="bg-gray-50 dark:bg-gray-800 border border-gray-300 text-gray-900 dark:text-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required rows="3"></textarea>
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
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pengajuan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($pengajuan->count() > 0)
                                @foreach ($pengajuan as $no => $pengajuans)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $no + 1 }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $pengajuans->nama }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $pengajuans->pengajuan }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($pengajuans->created_at)->format('d F Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($pengajuans->status == 0)
                                        <span class="text-red-500">Pending</span>
                                        @elseif ($pengajuans->status == 1)
                                        <span class="text-yellow-500">Silahkan masuk keruang chat</span>
                                        @elseif ($pengajuans->status == 2)
                                        <span class="text-green-500">Disetujui</span>
                                        @elseif ($pengajuans->status == 3)
                                        <span class="text-red-500">Tidak Disetujui</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($pengajuans->status == 0)
                                        <span class="text-red-500">Pending</span>
                                        @elseif ($pengajuans->status == 1)
                                        <span class="text-yellow-500">Silahkan masuk keruang chat</span>
                                        @elseif ($pengajuans->status == 2)
                                        <span class="text-green-500">Disetujui</span>
                                        @elseif ($pengajuans->status == 3)
                                        <span class="text-red-500">Tidak Disetujui</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-center  text-xs font-medium text-gray-500">DATA TIDAK DITEMUKAN</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>