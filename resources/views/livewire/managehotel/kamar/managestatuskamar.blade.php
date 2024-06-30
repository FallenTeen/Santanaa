<div>
    <form wire:submit.prevent="store">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Bagian kiri -->
            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="kode_status">Kode Status</label>
                    <input type="text" id="kode_status" wire:model="kode_status" placeholder="Kode Status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>

            <!-- Bagian kanan -->
            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status</label>
                    <input type="text" id="status" wire:model="status" placeholder="Status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
        </div>

        <!-- Deskripsi singkat -->
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="penjelasan_status">Penjelasan Status</label>
            <textarea id="penjelasan_status" wire:model="penjelasan_status" placeholder="Penjelasan Status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
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
                <th class="py-3 px-4">Kode Status</th>
                <th class="py-3 px-4">Status</th>
                <th class="py-3 px-4">Penjelasan Status</th>
                <th class="py-3 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach($statusKamar as $status)
            <tr>
                <td class="py-3 px-4">{{ $status->kode_status ?? '' }}</td>
                <td class="py-3 px-4">{{ $status->status ?? '' }}</td>
                <td class="py-3 px-4">{{ $status->penjelasan_status ?? '' }}</td>
                <td class="py-3 px-4">
                    <button wire:click="edit({{ $status->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Edit
                    </button>
                    <button wire:click="destroy({{ $status->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Hapus
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
