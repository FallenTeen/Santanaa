<!-- resources/views/livewire/booking/create-booking.blade.php -->

<div>
    @if($currentStep == 1)
        {{-- Step 1: Informasi Utama --}}
        <h3>Step 1: Informasi Utama</h3>
        <form wire:submit.prevent="validateData">
            <div>
                <label>Nama:</label>
                <input type="text" wire:model="nama">
                @error('nama') <span>{{ $message }}</span> @enderror
            </div>
            <div>
                <label>Email:</label>
                <input type="email" wire:model="email">
                @error('email') <span>{{ $message }}</span> @enderror
            </div>
            <button wire:click="nextStep">Next</button>
        </form>
    @elseif($currentStep == 2)
        {{-- Step 2: Informasi Tamu --}}
        <h3>Step 2: Informasi Tamu</h3>
        <form wire:submit.prevent="validateData">
            <div>
                <label>Nama:</label>
                <input type="text" wire:model="nama">
                @error('nama') <span>{{ $message }}</span> @enderror
            </div>
            <div>
                <label>Email:</label>
                <input type="email" wire:model="email">
                @error('email') <span>{{ $message }}</span> @enderror
            </div>
            <div>
                <label>Tanggal Lahir:</label>
                <input type="date" wire:model="tanggal_lahir">
                @error('tanggal_lahir') <span>{{ $message }}</span> @enderror
            </div>
            <div>
                <label>Nomor KTP:</label>
                <input type="text" wire:model="nomor_ktp">
                @error('nomor_ktp') <span>{{ $message }}</span> @enderror
            </div>
            <button wire:click="nextStep">Next</button>
            <button wire:click="kembali">Back</button>
        </form>
    @elseif($currentStep == 3)
        {{-- Step 3: Pilih Kamar --}}
        <h3>Step 3: Pilih Kamar</h3>
        <form wire:submit.prevent="validateData">
            <div>
                <label>Pilih Kamar:</label>
                <select wire:model="kamar">
                    @foreach($kamarTersedia as $kamar)
                        <option value="{{ $kamar->id }}">{{ $kamar->nama_kamar }}</option>
                    @endforeach
                </select>
            </div>
            <button wire:click="nextStep">Next</button>
            <button wire:click="kembali">Back</button>
        </form>
    @elseif($currentStep == 4)
        {{-- Step 4: Review & Submit --}}
        <h3>Step 4: Review & Submit</h3>
        <form wire:submit.prevent="reserve">
            <div>
                <p>Nama: {{ $nama }}</p>
                <p>Email: {{ $email }}</p>
                <p>Tanggal Lahir: {{ $tanggal_lahir }}</p>
                <p>Nomor KTP: {{ $nomor_ktp }}</p>
                <p>Kamar: {{ $kamar }}</p>
            </div>
            <button type="submit">Submit</button>
            <button wire:click="kembali">Back</button>
        </form>
    @endif
</div>
