<?php

namespace App\Livewire\Managehotel\Kamar;

use Livewire\Component;
use App\Models\StatusKamar;

class StatusKamarCreate extends Component
{
    public $kode_status, $status, $penjelasan_status;
    public function render()
    {
        return view('livewire.managehotel.kamar.status-kamar-create');
    }
    public function store(){
        $validatedData = $this->validate([
            'kode_status' =>'required|unique:status_kamars',
            'status' =>'required',
            'penjelasan_status'=>'required',
        ]);
        StatusKamar::create($validatedData);

        session()->flash('message', 'Data Berhasil Ditambahkan');
        $this->resetInputFields();
    }
    public function resetInputFields(){
        $this->kode_status='';
        $this->status='';
        $this->penjelasan_status='';
    }
}
