<?php

namespace App\Livewire\Booking;

use Livewire\Component;
use App\Models\Booking;

class EditReservasi extends Component
{
    public $booking;

    protected $rules = [
        'booking.jumlah_tamu' => 'required|integer|min:1',
        'booking.kamar_id' => 'required',
        'booking.dp_amount' => 'required|numeric|min:0',
    ];
    public function mount(Booking $booking){
        $this->booking = $booking;
    }
    public function render()
    {
        return view('livewire.booking.edit-reservasi');
    }

    public function update(){
        $this->validate();

        $this->booking->save();

        session()->flash('message', 'Reservasi berhasil diperbarui.');

        return redirect()->route('index.reservasi');
    }
}
