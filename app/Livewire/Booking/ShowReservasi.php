<?php

namespace App\Livewire\Booking;

use Livewire\Component;
use App\Models\Booking;
class ShowReservasi extends Component
{
    public $booking;

    public function mount(Booking $booking)
    {
        $this->booking = $booking;
    }
    public function render()
    {
        return view('livewire.booking.show-reservasi');
    }
}
