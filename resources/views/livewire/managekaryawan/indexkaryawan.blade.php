<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Data Karyawan</h1>
    <div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md rounded my-6">
    <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Nomor Telepon</th>
                    <th class="px-4 py-2">Alamat</th>
                    <th class="px-4 py-2">Divisi</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center text-gray-700">
                @foreach ($karyawans as $karyawan)
                    <tr>
                        <td class="px-4 py-2">{{ $karyawan->nama }}</td>
                        <td class="px-4 py-2">{{ $karyawan->email }}</td>
                        <td class="px-4 py-2">{{ $karyawan->notelp }}</td>
                        <td class="px-4 py-2">{{ $karyawan->alamat }}</td>
                        <td class="px-4 py-2">{{ $karyawan->divisi }}</td>
                        <td class="px-4 py-2">
                            <button wire:click="edit({{ $karyawan->id }})"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-flex items-center mx-2"
                                    wire:loading.attr="disabled">
                                Edit
                            </button>
                            <button wire:click="delete({{ $karyawan->id }})"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded inline-flex items-center mx-2"
                                    wire:loading.attr="disabled">
                                Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Edit -->
    @if ($editId)
        <div class="fixed z-10 inset-0 overflow-y-auto" x-data="{ showModal: true }" x-show="showModal" x-cloak>
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 sm:pt-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                                    Edit Karyawan
                                </h3>
                                <div class="mt-2">
                                    <form wire:submit.prevent="update">
                                        <input type="hidden" wire:model="editId">
                                        <div class="mb-4">
                                            <label for="editNama" class="block text-sm font-medium text-gray-700">Nama</label>
                                            <input type="text" id="editNama" wire:model.defer="editNama"
                                                   class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('editNama') border-red-500 @enderror">
                                            @error('editNama') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="email" id="editEmail" wire:model.defer="editEmail"
                                                   class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('editEmail') border-red-500 @enderror">
                                            @error('editEmail') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="editDivisi" class="block text-sm font-medium text-gray-700">Divisi</label>
                                            <select id="editDivisi" wire:model.defer="editDivisi" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('editDivisi') border-red-500 @enderror">
                                                <option value="">Pilih Divisi</option>
                                                <option value="Security">Security</option>
                                                <option value="Engineer">Engineer</option>
                                            </select>
                                            @error('editDivisi') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                                @click="showModal = false; Livewire.emit('update')">
                            Simpan Perubahan
                        </button>
                        <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                @click="showModal = false">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@push('scripts')
    <script>
        Livewire.on('karyawanUpdated', () => {
            Livewire.emit('refreshTable');
        });

        Livewire.on('editDataUpdated', (data) => {
            document.getElementById('editNama').value = data.editNama;
            document.getElementById('editEmail').value = data.editEmail;
            document.getElementById('editDivisi').value = data.editDivisi;
        });
    </script>
@endpush
