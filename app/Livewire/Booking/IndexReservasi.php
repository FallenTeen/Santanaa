<?php

namespace App\Livewire\Booking;

use Livewire\Component;
use App\Models\Booking;

class IndexReservasi extends Component
{
    public function render()
    {
        $bookings = Booking::all();
        return view('livewire.booking.index-reservasi', compact('bookings'));
    }
    public function deleteBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        session()->flash('message', 'Reservasi berhasil dihapus.');
    }
}
