<div class="p-6">
    <h2 class="text-2xl font-bold mb-4">Manajemen Laporan</h2>

    <!-- Form untuk menambah laporan -->
    <form wire:submit.prevent="create" class="mb-6">
        <div class="mb-4">
            <label for="divisi" class="block text-sm font-medium text-gray-700">Divisi:</label>
            <select wire:model="divisi" id="divisi" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Pilih Divisi</option>
                <option value="Engineering">Engineering</option>
                <option value="Security">Security</option>
            </select>
            @error('divisi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="detail" class="block text-sm font-medium text-gray-700">Detail:</label>
            <textarea wire:model="detail" id="detail" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            @error('detail') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Tambah Laporan</button>
    </form>

    <hr class="my-6">

    <!-- Tabel untuk menampilkan daftar laporan -->
        <!-- pencararian -->
        <div class="max-w-7xl mx-auto flex items-center justify-between py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold">Laporan Pelanggan</h1>
            <div class="relative">
                <input type="text" placeholder="Cari..." class="w-48 md:w-64 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 pr-10">
                <span class="absolute right-2 top-1/2 transform -translate-y-1/2">
                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.56-4.56M9 17a8 8 0 100-16 8 8 0 000 16z" />
                    </svg>
                </span>
            </div>
        </div>
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 overflow-x-auto">
        <table class="min-w-full bg-white border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-3 bg-gray-800 text-xs leading-4 font-medium text-white uppercase tracking-wider">Divisi</th>
                    <th class="px-2 py-3 bg-gray-800 text-xs leading-4 font-medium text-white uppercase tracking-wider">ID Lap.</th>
                    <th class="px- py-3 bg-gray-800 text-xs leading-4 font-medium text-white uppercase tracking-wider">Detail</th>
                    <th class="px-6 py-3 bg-gray-800 text-xs leading-4 font-medium text-white uppercase tracking-wider">Aksi</th>
                    <th class="px-6 py-3 bg-gray-800 text-xs leading-4 font-medium text-white uppercase tracking-wider">Ditindak Oleh</th>
                    <th class="px-6 py-3 bg-gray-800 text-xs leading-4 font-medium text-white uppercase tracking-wider">Tindakan</th>
                    <th class="px-6 py-3 bg-gray-800 text-xs leading-4 font-medium text-white uppercase tracking-wider">Dibuat Pada</th>
                    <th class="px-6 py-3 bg-gray-800 text-xs leading-4 font-medium text-white uppercase tracking-wider">Ditindak Pada</th>
                </tr>
            </thead>
            <tbody>
            @foreach($reports as $report)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-no-wrap">{{ $report->id }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ $report->divisi }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ $report->detail }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $report->aksi }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap text-center">
                        {{ $report->assigned_to ? $karyawans->firstWhere('id', $report->assigned_to)->nama : 'Belum Ditindak' }}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap flex justify-center space-x-2">
                        @if ($report->aksi == 'Menunggu Tindakan')
                            <button wire:click="selectReport({{ $report->id }})" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none">Ambil Tindakan</button>
                        @elseif ($report->aksi == 'Tindakan Diambil')
                            <button wire:click="completeAction({{ $report->id }})" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none">Selesai</button>
                        @elseif ($report->aksi == 'Selesai Ditindak')
                            <!-- Tombol tidak ditampilkan -->
                        @endif
                        <button wire:click="showDetail({{ $report->id }})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none">Detail</button>
                        <button wire:click="delete({{ $report->id }})" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none">Hapus</button>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ $report->created_at }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap">{{ $report->updated_at }}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <!-- Form untuk mengambil tindakan -->
    @if($selectedReport)

    <div class="mt-6">
        <h3 class="text-lg font-bold mb-2">Ambil Tindakan untuk Laporan ID {{ $selectedReport->id }}</h3>
        <form wire:submit.prevent="takeAction">
            <div class="mb-4">
                <label for="karyawan" class="block text-sm font-medium text-gray-700">Pilih Karyawan:</label>
                <select wire:model="karyawanId" id="karyawan" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="">Pilih Karyawan</option>
                    @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                    @endforeach
                </select>
                @error('karyawanId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Ambil Tindakan</button>
        </form>
    </div>
    @endif
</div>
