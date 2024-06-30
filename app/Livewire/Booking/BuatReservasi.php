<?php

namespace App\Livewire\Booking;

use Livewire\Component;
use App\Models\User;

class BuatReservasi extends Component
{
    public $step = 1;
    public $selectedUserId, $nama, $email;
    public function render()
    {
        return view('livewire.booking.buat-reservasi', ['users' => User::where('role', 3)->get()]);
    }

    public function nextStep(){
        $this->validate([
            'selectedUserId' => 'required',
        ]);
        $user = User::find($this->selectedUserId);
        $this->nama = $user->name;
        $this->email = $user->email;

        $this->step++;
    }

    public function backStep()
    {
        $this->step--;
    }
}
