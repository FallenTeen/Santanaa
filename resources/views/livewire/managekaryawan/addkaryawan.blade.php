<div class="container mx-auto p-4">
    <form wire:submit.prevent="store" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Bagian kiri -->
            <div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                    <input type="text" id="name" wire:model="name" placeholder="Nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" wire:model="email" placeholder="Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @error('email') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>
                <div class="mb-4">
                    <label for="notelp" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telepon</label>
                    <input type="text" id="notelp" wire:model="notelp" placeholder="Nomor Telepon" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @error('notelp') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>
            </div>

            <!-- Bagian kanan -->
            <div>
                <div class="mb-4">
                    <label for="alamat" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                    <input type="text" id="alamat" wire:model="alamat" placeholder="Alamat" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @error('alamat') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" id="password" wire:model="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    @error('password') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>
                <div class="mb-4">
                    <label for="divisi" class="block text-gray-700 text-sm font-bold mb-2">Divisi</label>
                    <select id="divisi" wire:model="divisi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="">Pilih Divisi</option>
                        <option value="Security">Security</option>
                        <option value="Engineer">Engineer</option>
                    </select>
                    @error('divisi') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <!-- Tombol Simpan -->
        <div class="flex items-center justify-center mt-6">
            <button type="submit" class="bg-[#B9A165] hover:bg-[#A08F4D] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Simpan
            </button>
        </div>
    </form>

</div>
