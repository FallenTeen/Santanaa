
<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="store" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Bagian kiri -->
            <div>
                <div class="mb-4">
                    <label for="kode_tipe" class="block text-gray-700 text-sm font-bold mb-2">Kode Tipe</label>
                    <input id="kode_tipe" type="text" wire:model="kode_tipe" placeholder="Kode Tipe" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('kode_tipe') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Bagian kanan -->
            <div>
                <div class="mb-4">
                    <label for="tipe" class="block text-gray-700 text-sm font-bold mb-2">Tipe</label>
                    <input id="tipe" type="text" wire:model="tipe" placeholder="Tipe" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('tipe') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
        <div class="mb-6">
            <label for="penjelasan_tipe" class="block text-gray-700 text-sm font-bold mb-2">Penjelasan Tipe</label>
            <textarea id="penjelasan_tipe" wire:model="penjelasan_tipe" placeholder="Penjelasan Tipe" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            @error('penjelasan_tipe') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Tombol Simpan -->
        <div class="flex items-center justify-center">
            <button type="submit" class="bg-[#B9A165] hover:bg-[#A08F4D] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan
            </button>
        </div>
        <div class="flex items-center justify-center mt-4">
        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        onclick="window.location.reload();">
            Kembali ke Kelola Management Hotel
        </button>
        </div>
    </form>
</div>


