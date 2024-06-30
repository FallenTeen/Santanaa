<?php

namespace App\Livewire\Managehotel\Kamar;

use Livewire\Component;
use App\Models\TipeKamar;

class TipeKamarCreate extends Component
{
    public $tipeKamar;
    public $kode_tipe, $tipe, $penjelasan_tipe;
    
    public function render()
    {
        return view('livewire.managehotel.kamar.tipe-kamar-create');
    }
    public function store()
    {
        $validatedData = $this->validate([
            'kode_tipe' => 'required|unique:tipe_kamars',
            'tipe' => 'required',
            'penjelasan_tipe' => 'required',
        ]);
    
        TipeKamar::create($validatedData);
    
        session()->flash('message', 'Data tipe kamar berhasil ditambahkan.');
        $this->resetInputFields();
    }
    


    private function resetInputFields()
    {
        $this->kode_tipe = '';
        $this->tipe = '';
        $this->penjelasan_tipe = '';
    }
}
