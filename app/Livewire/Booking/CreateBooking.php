<?php

namespace App\Livewire\Booking;

use Livewire\Component;
use App\Models\Booking;
use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Guest;

class CreateBooking extends ModalComponent
{
    public $currentStep = 1;
    public $nama, $email, $tanggal_lahir, $nomor_ktp, $jumlah_tamu, $dp;
    public $selectedKamar;

    public function mount()
    {
        $this->currentStep = 1;
    }

    public function selectKamar($kamarId)
    {
        $this->selectedKamar = $kamarId;
    }
    public function render()
    {
        return view('livewire.booking.create-booking', [
            'guests' => User::where('role', '3')->get(), // Assuming guests are users with role 3
            'kamarTersedia' => Kamar::where('status_kamar_id', '1')->get(),
        ]);
    }

    public function nextStep()
    {
        $this->currentStep++;
    }

    public function kembali()
    {
        $this->currentStep--;
    }

    public function validateData()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'nama' => 'required|string',
                'email' => 'required|email',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'nama' => 'required|string',
                'email' => 'required|email|unique:guests,email',
                'tanggal_lahir' => 'required|date',
                'nomor_ktp' => 'required',
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                'selectedKamar' => 'required',
            ]);
        } elseif ($this->currentStep == 4) {
            $this->validate([
                'dp' => 'required',
            ]);
        }
    }

    public function storeGuest(){
        
    }

    public function reserve()
    {
        // Find or create guest
        $user = User::where('email', $this->email)->first();

        if ($user) {
            $guest = Guest::firstOrCreate([
                'nama' => $this->nama,
                'email' => $this->email,
                'tanggal_lahir' => $this->tanggal_lahir,
                'nomor_ktp' => $this->nomor_ktp,
                'user_id' => $user->id,
            ]);
        } else {
            $guest = Guest::firstOrCreate([
                'nama' => $this->nama,
                'email' => $this->email,
                'tanggal_lahir' => $this->tanggal_lahir,
                'nomor_ktp' => $this->nomor_ktp,
            ]);
        }

        // Create booking record
        Booking::create([
            'nama' => $this->nama,
            'email' => $this->email,
            'guest_id' => $guest->id,
            'kamar_id' => $this->selectedKamar,
            'dp_amount' => $this->dp,
            'jumlah_tamu' => $this->jumlah_tamu,
        ]);

        // Reset form and step
        $this->reset();
        $this->currentStep = 1;
    }

}