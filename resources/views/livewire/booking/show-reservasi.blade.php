<!-- resources/views/livewire/booking/show-reservasi.blade.php -->
<div>
    <h2>Detail Reservasi</h2>
    <p>ID: {{ $booking->id }}</p>
    <p>Jumlah Tamu: {{ $booking->jumlah_tamu }}</p>
    <p>ID Kamar: {{ $booking->kamar_id }}</p>
    <p>DP Amount: {{ $booking->dp_amount }}</p>
</div>
