<?php
// app/Http/Livewire/Managehotel/Kamar/ManageTipekamarEdit.php

namespace App\Livewire\Managehotel\Kamar;

use Livewire\Component;
use App\Models\TipeKamar;

class Tipekamaredit extends Component
{
    public $kode_tipe, $tipe, $penjelasan_tipe, $selectedId;

    protected $listeners = ['editTipeKamar'];

    public function render()
    {
        return view('livewire.managehotel.kamar.tipe-kamaredit');
    }

    public function editTipeKamar($id)
    {
        $tipeKamar = TipeKamar::findOrFail($id);
        $this->selectedId = $id;
        $this->kode_tipe = $tipeKamar->kode_tipe;
        $this->tipe = $tipeKamar->tipe;
        $this->penjelasan_tipe = $tipeKamar->penjelasan_tipe;
    }

    public function update()
    {
        $this->validate([
            'kode_tipe' => 'required|unique:tipe_kamars,kode_tipe,' . $this->selectedId,
            'tipe' => 'required',
            'penjelasan_tipe' => 'required',
        ]);

        if ($this->selectedId) {
            $record = TipeKamar::findOrFail($this->selectedId);
            $record->update([
                'kode_tipe' => $this->kode_tipe,
                'tipe' => $this->tipe,
                'penjelasan_tipe' => $this->penjelasan_tipe,
            ]);
            session()->flash('message', 'Data tipe kamar berhasil diperbarui.');
        }

    
    }

    private function resetInputFields()
    {
        $this->kode_tipe = '';
        $this->tipe = '';
        $this->penjelasan_tipe = '';
    }
}
