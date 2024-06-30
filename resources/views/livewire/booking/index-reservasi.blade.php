<!-- resources/views/livewire/booking/index-reservasi.blade.php -->
<div>
    <h2>Daftar Reservasi</h2>
    @if(session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif

    <ul>
        @foreach($bookings as $booking)
            <li>
                {{ $booking->id }} - Jumlah Tamu: {{ $booking->jumlah_tamu }}
                <button wire:click="deleteBooking({{ $booking->id }})">Hapus</button>
            </li>
        @endforeach
    </ul>
</div>
