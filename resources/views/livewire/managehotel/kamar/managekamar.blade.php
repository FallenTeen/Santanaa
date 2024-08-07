<div class="container mx-auto p-4">
    <form wire:submit.prevent="store" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Bagian kiri -->
            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Pilih Tipe Kamar</label>
                    <select wire:model="tipe_kamar_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Pilih Tipe Kamar</option>
                        @foreach($tipeKamar as $tipeKamar)
                        <option value="{{ $tipeKamar->id }}">{{ $tipeKamar->tipe }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nomor Kamar</label>
                    <input type="number" wire:model="nomor" placeholder="Nomor Kamar" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Kapasitas</label>
                    <input type="number" wire:model="kapasitas" placeholder="Kapasitas" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>

            <!-- Bagian kanan -->
            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Pilih Status Kamar</label>
                    <select wire:model="status_kamar_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Pilih Status Kamar</option>
                        @foreach($statusKamar as $statusKamar)
                        <option value="{{ $statusKamar->id }}">{{ $statusKamar->status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Lantai</label>
                    <input type="number" wire:model="lantai" placeholder="Lantai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                    <input type="number" wire:model="harga" placeholder="Harga" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
        </div>

        <!-- Deskripsi singkat -->
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Singkat</label>
            <textarea wire:model="deskripsi_singkat" placeholder="Deskripsi Singkat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>

        <!-- Tombol Simpan -->
        <div class="flex items-center justify-center">
            <button type="submit" class="bg-[#B9A165] hover:bg-[#A08F4D] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan
            </button>
        </div>
    </form>

    <!-- Tabel -->
    <table class="min-w-full bg-white shadow-md rounded my-6">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Tipe Kamar</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Status Kamar</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Nomor</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Lantai</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Kapasitas</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Harga</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Deskripsi Singkat</th>
                <th class="py-3 px-4 uppercase font-semibold text-sm">Aksi</th>
            </tr>
        </thead>
        <!-- pencararian -->
        <div class="max-w-7xl mx-auto flex items-center justify-between py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold">Data Kamar</h1>
            <div class="relative">
                <input type="text" placeholder="Cari..." class="w-48 md:w-64 bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 pr-10">
                <span class="absolute right-2 top-1/2 transform -translate-y-1/2">
                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.56-4.56M9 17a8 8 0 100-16 8 8 0 000 16z" />
                    </svg>
                </span>
            </div>
        </div>

        @foreach($kamar as $kamar)
        <tr>
            <td class="py-3 px-4">{{ $kamar->tipeKamar->tipe }}</td>
            <td class="py-3 px-4">{{ $kamar->statusKamar->status }}</td>
            <td class="py-3 px-4">{{ $kamar->nomor }}</td>
            <td class="py-3 px-4">{{ $kamar->lantai }}</td>
            <td class="py-3 px-4">{{ $kamar->kapasitas }}</td>
            <td class="py-3 px-4">{{ $kamar->harga }}</td>
            <td class="py-3 px-4">{{ $kamar->deskripsi_singkat }}</td>
            <td class="py-3 px-4">
                <button wire:click="edit({{ $kamar->id }})" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Edit
                </button>
                <button wire:click="destroy({{ $kamar->id }})" class="bg-red-500 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Hapus
                </button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>