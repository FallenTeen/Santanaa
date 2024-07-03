<?php

namespace App\Livewire\Booking;

use Livewire\Component;
use App\Models\Booking;
use App\Models\Guest;
use App\Models\Kamar;

class IndexBooking extends Component
{
    public function render()
    {
        $bookings = Booking::with('guest', 'kamar')->get();
        return view('livewire.booking.index-booking',['booking'=>$bookings]);
    }
    public function edit($id){
        $this->emit('editBooking', $id);
    }
    public function destroy($id){
        Booking::findOrFail($id)->delete();
        session()->flash('message','Booking Berhasil Dihapus');
    }
}
