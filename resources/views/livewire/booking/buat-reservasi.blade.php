<!-- resources/views/livewire/booking/buat-reservasi.blade.php -->
<div>
    @if($step === 1)
        <form wire:submit.prevent="nextStep">
            <label for="selectedUserId">Pilih Pengguna:</label>
            <select wire:model="selectedUserId">
                <option value="">Pilih Pengguna</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('selectedUserId') <span class="error">{{ $message }}</span> @enderror

            <button type="submit">Selanjutnya</button>
        </form>
    @elseif($step === 2)
        <h2>Informasi Pengguna Terpilih:</h2>
        <p>Nama: {{ $nama }}</p>
        <p>Email: {{ $email }}</p>

        <button wire:click="backStep">Kembali</button>
    @endif
</div>
