<!-- resources/views/livewire/booking/create-booking.blade.php -->

<div class="max-w-lg mx-auto px-12 py-16">
    @if($currentStep == 1)
        {{-- Step 1: Informasi Utama --}}
        <h3 class="text-xl font-bold mb-4">Step 1: Informasi Utama</h3>
        <form wire:submit.prevent="validateData">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="nama">
                @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="email">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <button type="button" wire:click="nextStep" class="inline-block px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Next</button>
        </form>
    @elseif($currentStep == 2)
        {{-- Step 2: Informasi Tamu --}}
        <h3 class="text-xl font-bold mb-4">Step 2: Informasi Tamu</h3>
        <form wire:submit.prevent="storeGuest">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nama:</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="nama">
                @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="email">
                @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Tanggal Lahir:</label>
                <input type="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="tanggal_lahir">
                @error('tanggal_lahir') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Nomor KTP:</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="nomor_ktp">
                @error('nomor_ktp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Jumlah Tamu:</label>
                <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="jumlah_tamu">
                @error('jumlah_tamu') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <button type="button" wire:click="kembali" class="inline-block px-4 py-2 ml-4 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Back</button>
            <button type="button" wire:click="nextStep" class="inline-block px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Next</button>
        </form>
    @elseif($currentStep == 3)
        {{-- Step 3: Pilih Kamar --}}
        <h3 class="text-xl font-bold mb-4">Step 3: Pilih Kamar</h3>
        <form wire:submit.prevent="validateData">
            <div class="grid grid-cols-1 gap-4">
                @foreach($kamarTersedia as $kamar)
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <div class="px-4 py-5 sm:p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Kamar {{ $kamar->nomor }}</h3>
                            <ul class="divide-y divide-gray-200">
                                <li class="flex justify-between items-center py-2">
                                    <span class="font-medium">Tipe Kamar:</span>
                                    <span>{{ $kamar->tipeKamar->nama }}</span>
                                </li>
                                <li class="flex justify-between items-center py-2">
                                    <span class="font-medium">Status Kamar:</span>
                                    <span>{{ $kamar->statusKamar->nama }}</span>
                                </li>
                                <li class="flex justify-between items-center py-2">
                                    <span class="font-medium">Lantai:</span>
                                    <span>{{ $kamar->lantai }}</span>
                                </li>
                                <li class="flex justify-between items-center py-2">
                                    <span class="font-medium">Kapasitas:</span>
                                    <span>{{ $kamar->kapasitas }}</span>
                                </li>
                                <li class="flex justify-between items-center py-2">
                                    <span class="font-medium">Harga:</span>
                                    <span>{{ $kamar->harga }}</span>
                                </li>
                                <li class="flex justify-between items-center py-2">
                                    <span class="font-medium">Deskripsi:</span>
                                    <span>{{ $kamar->deskripsi_singkat }}</span>
                                </li>
                            </ul>
                            <button type="button" wire:click="selectKamar({{ $kamar->id }})" class="inline-block mt-4 px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Pilih Kamar</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="button" wire:click="nextStep" class="inline-block px-4 py-2 ml-4 bg-indigo-500 text-white rounded hover:bg-indigo-600">Next</button>
            <button type="button" wire:click="kembali" class="inline-block px-4 py-2 mt-4 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Back</button>
        </form>
    @elseif($currentStep == 4)
        {{-- Step 4: Review & Submit --}}
        <h3 class="text-xl font-bold mb-4">Step 4: Review & Submit</h3>
        <form wire:submit.prevent="reserve">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Informasi Reservasi</h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Nama</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $nama }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Email</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $email }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Tanggal Lahir</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $tanggal_lahir }}</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Nomor KTP</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $nomor_ktp }}</dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Kamar</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $selectedKamar }}</dd>
                        </div>
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Down Payment:</label>
                            <input type="text" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" wire:model="dp">
                            @error('dp') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </dl>
                </div>
            </div>
            <button type="submit" class="inline-block px-4 py-2 mt-4 bg-indigo-500 text-white rounded hover:bg-indigo-600">Submit</button>
            <button type="button" wire:click="kembali" class="inline-block px-4 py-2 ml-4 bg-gray-300 text-gray-700 rounded hover:bg-gray-400">Back</button>
        </form>
    @endif
</div>
