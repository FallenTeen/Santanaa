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
    public $currentStep = 1, $total_step = 4, $id;
    public $nama, $email, $role;
    public $user_id, $tanggal_lahir, $nomor_ktp;
    public $guest_id, $selectedKamar, $kamar, $jumlah_tamu, $dp;
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
        return Kamar::where('status_kamar_id', '8')->get();
    }
    public function selectKamar($kamarId){
        $this->selectedKamar = $kamarId;
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
                'kamar'=>'required',
            ]);
        }
        elseif($this->currentStep == 4){
            $this->validate([
                'dp'=>'required',
            ]);
        }
    }

    public function reserve(){
        if($this->currentStep = 4){
            $user = User::where('email', $this->email)->first();
            if ($user){
            $guest = Guest::firstOrCreate([
                'nama'=>$this->nama,
                'email'=>$this->email,
                'tanggal_lahir'=>$this->tanggal_lahir,
                'nomor_ktp'=>$this->nomor_ktp,
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
            $booking = Booking::create([
                'nama'=>$this->nama,
                'email'=>$this->email,
                'guest_id' => $guest->id,
                'kamar_id' => $this->selectedKamar,
                'dp_amount'=>$this->dp,
                'jumlah_tamu'=>$this->jumlah_tamu,
            ]);
            $this->reset();
            $this->currentStep=1;
        }
    }

}