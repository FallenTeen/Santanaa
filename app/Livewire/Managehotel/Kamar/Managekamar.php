<?php

namespace App\Livewire\Managehotel\Kamar;

use Livewire\Component;
use App\Models\Kamar;
use App\Models\TipeKamar;
use App\Models\StatusKamar;

class Managekamar extends Component
{
    public $tipe_kamar_id, $status_kamar_id, $nomor, $lantai, $kapasitas, $harga, $deskripsi_singkat;
    public $kamar, $tipeKamar, $statusKamar, $selectedId;
    public function render()
    {
        $this->kamar = Kamar::with('tipeKamar','statusKamar')->get();
        $this->tipeKamar = TipeKamar::all();
        $this->statusKamar = StatusKamar::all();
        return view('livewire.managehotel.kamar.managekamar');
    }
    public function store(){
        $this->validate([
            'tipe_kamar_id' =>'required|exists:tipe_kamars,id',
            'status_kamar_id' =>'required|exists:status_kamars,id',
            'nomor' => 'required',
            'lantai'=>'required|integer',
            'kapasitas'=>'required|integer',
            'harga'=>'required|numeric',
            'deskripsi_singkat'=>'required',
        ]);

        Kamar::create([
            'tipe_kamar_id' => $this->tipe_kamar_id,
            'status_kamar_id' => $this->status_kamar_id,
            'nomor' => $this->nomor,
            'lantai' => $this->lantai,
            'kapasitas' => $this->kapasitas,
            'harga' => $this->harga,
            'deskripsi_singkat' => $this->deskripsi_singkat,                
        ]);
        $this->resetInputFields();
    }

    public function edit($id){
        $record = Kamar::findOrFail($id);
        $this->selectedId = $id;
        $this->tipe_kamar_id = $record->tipe_kamar_id;
        $this->status_kamar_id = $record->status_kamar_id;
        $this->nomor = $record->nomor;
        $this->lantai = $record->lantai;
        $this->kapasitas = $record->kapasitas;
        $this->harga = $record->harga;
        $this->deskripsi_singkat = $record->deskripsi_singkat;
    }
    public function update(){
        $this->validate([
            'tipe_kamar_id' => 'required|exists:tipe_kamar,id',
            'status_kamar_id' => 'required|exists:status_kamar,id',
            'nomor' => 'required',
            'lantai' => 'required|integer',
            'kapasitas' => 'required|integer',
            'harga' => 'required|numeric',
            'deskripsi_singkat' => 'required',
        ]);

        if ($this->selectedId) {
            $record = Kamar::find($this->selectedId);
            $record->update([
                'tipe_kamar_id' => $this->tipe_kamar_id,
                'status_kamar_id' => $this->status_kamar_id,
                'nomor' => $this->nomor,
                'lantai' => $this->lantai,
                'kapasitas' => $this->kapasitas,
                'harga' => $this->harga,
                'deskripsi_singkat' => $this->deskripsi_singkat,
            ]);
            $this->resetInputFields();
        }
    }
    public function destroy($id) {
        if ($id) {
            $record = Kamar::where('id', $id);
            $record->delete();
        }
    }

    private function resetInputFields() {
        $this->tipe_kamar_id = '';
        $this->status_kamar_id = '';
        $this->nomor = '';
        $this->lantai = '';
        $this->kapasitas = '';
        $this->harga = '';
        $this->deskripsi_singkat = '';
    }
}
