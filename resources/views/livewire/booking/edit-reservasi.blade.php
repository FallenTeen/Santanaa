<!-- resources/views/livewire/booking/edit-reservasi.blade.php -->
<div>
    <form wire:submit.prevent="update">
        <label for="jumlah_tamu">Jumlah Tamu:</label>
        <input type="number" wire:model="booking.jumlah_tamu">
        @error('booking.jumlah_tamu') <span class="error">{{ $message }}</span> @enderror

        <label for="kamar_id">ID Kamar:</label>
        <input type="text" wire:model="booking.kamar_id">
        @error('booking.kamar_id') <span class="error">{{ $message }}</span> @enderror

        <label for="dp_amount">Jumlah DP:</label>
        <input type="number" wire:model="booking.dp_amount">
        @error('booking.dp_amount') <span class="error">{{ $message }}</span> @enderror

        <button type="submit">Simpan</button>
    </form>
</div>
