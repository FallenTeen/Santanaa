<?php

namespace App\Livewire\Booking;

use Livewire\Component;
use App\Models\Booking;
use App\Models\User;
use App\Models\Kamar;
use App\Models\Guest;

class CreateBooking extends Component
{
    public $currentStep = 1, $total_step = 4, $id;
    public $nama, $email, $role;
    public $user_id, $tanggal_lahir, $nomor_ktp;
    public $guest_id, $kamar, $jumlah_guest;
    public $datai = [];
    public function mount(){
        $this->currentStep = 1;
    }
    public function render()
    {
        return view('livewire.booking.create-booking',[
            'guests' => $this->showGuest(),
            'kamarTersedia' => $this->kamarTersedia(),
        ]);
    }
    public function nextStep(){
        $this->currentStep++;
    }
    public function kembali(){
        $this->currentStep--;
    }
    public function showGuest(){
        return User::where('role', '3')->get();
    }
    public function kamarTersedia(){
        return Kamar::where('id', '8')->get();
    }
    public function validateData(){
        if($this->currentStep == 1){
            $this->validate([
                'nama'=>'required|string',
                'email'=>'required|email',
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'nama'=>'required|string',
                'email'=>'required|email|unique:guests,email',
                'tanggal_lahir' => 'required|date',
                'nomor_ktp' => 'required',
            ]);
        }
        elseif($this->currentStep == 3){
            $this->validate([
                'datai'=>'required|array'
            ]);
        }
    }

    public function reserve(){
        if($this->currentStep = 4){
            $guest = Guest::firstOrCreate([
                'nama'=>$this->nama,
                'email'=>$this->email,
                'tanggal_lahir'=>$this->tanggal_lahir,
                'nomor_ktp'=>$this->nomor_ktp,
            ]);
            $booking = Booking::create([
                'nama'=>$this->nama,
                'email'=>$this->email,
                'guest_id' => $guest->id,
                'kamar_id' => $this->kamar,
            ]);
        }
    }
}
