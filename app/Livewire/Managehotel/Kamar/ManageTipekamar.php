<?php

namespace App\Livewire\Managehotel\Kamar;

use Livewire\Component;
use App\Models\TipeKamar;

class ManageTipekamar extends Component
{

    public $tipeKamar;
    public $kode_tipe, $tipe, $penjelasan_tipe, $selectedId;
    
    // Tidak mengatur properti $layout

    public function render()
    {
        $this->tipeKamar = TipeKamar::all();
        return view('livewire.managehotel.kamar.managetipekamar');
    }

    public function store()
    {
        $this->validate([
            'kode_tipe' => 'required|unique:tipe_kamars',
            'tipe' => 'required',
            'penjelasan_tipe' => 'required',
        ]);

        Tipekamar::create([
            'kode_tipe' => $this->kode_tipe,
            'tipe' => $this->tipe,
            'penjelasan_tipe' => $this->penjelasan_tipe,
        ]);

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $record = TipeKamar::findOrFail($id);
        $this->selectedId = $id;
        $this->kode_tipe = $record->kode_tipe;
        $this->tipe = $record->tipe;
        $this->penjelasan_tipe = $record->penjelasan_tipe;
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
            $this->resetInputFields();
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = TipeKamar::findOrFail($id);
            $record->delete();
        }
    }

    private function resetInputFields()
    {
        $this->kode_tipe = '';
        $this->tipe = '';
        $this->penjelasan_tipe = '';
    }
}
