<?php

namespace App\Livewire\Managehotel\Kamar;

use Livewire\Component;
use App\Models\StatusKamar;

class StatusKamarIndex extends Component
{
    public function render()
    {
        $statusKamar = StatusKamar::all();
        return view('livewire.managehotel.kamar.status-kamar-index', ['statusKamar' => $statusKamar,]);
    }
    public function edit($id){
        $this->emit('editStatusKamar', $id);
    }
    public function destroy($id){
        StatusKamar::findOrFail($id)->delete();
        session()->flash('message','Status Kamar Berhasil Dihapus');
    }
}
