<?php
// app/Http/Livewire/Managehotel/Kamar/ManageTipekamarIndex.php

namespace App\Livewire\Managehotel\Kamar;

use Livewire\Component;
use App\Models\TipeKamar;

class TipeKamarIndex extends Component
{

    public function render()
    {
        $tipeKamar = TipeKamar::all();
        return view('livewire.managehotel.kamar.tipe-kamar-index', [
            'tipeKamar' => $tipeKamar,
        ]);
    }

    public function edit($id)
    {
        // Mengirim event untuk mengedit data
        $this->emit('editTipeKamar', $id);
    }

    public function destroy($id)
    {
        // Mengirim event untuk menghapus data
        TipeKamar::findOrFail($id)->delete();
        session()->flash('message', 'Data tipe kamar berhasil dihapus.');
    }
}
