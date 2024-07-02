<?php

namespace App\Livewire\Managehotel\Kamar;
use Illuminate\Support\Facades\Log;

use Livewire\Component;
use App\Models\StatusKamar;

class ManageStatuskamar extends Component
{
    public $kode_status, $status, $penjelasan_status;
    public $statusKamar, $selectedId;
    public $createForm = false;
    public $editForm = false;

    public function render()
    {
        $this->statusKamar = StatusKamar::all(); 
        return view('livewire.managehotel.kamar.managestatuskamar', ['statusKamar' => $this->statusKamar]);
    }
    public function store()
    {
        $this->validate([
            'kode_status' => 'required|unique:status_kamars,kode_status',
            'status' => 'required',
            'penjelasan_status' => 'required',
        ]);

        StatusKamar::create([
            'kode_status' => $this->kode_status,
            'status' => $this->status,
            'penjelasan_status' => $this->penjelasan_status,
        ]);

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $this->editForm = true;
        // Load the Status Kamar data for editing
        $record = StatusKamar::findOrFail($id);
        $this->kode_status = $record->kode_status;
        $this->status = $record->status;
        $this->penjelasan_status = $record->penjelasan_status;
    }

public function update()
{
    $this->validate([
        'kode_status' => 'required|unique:status_kamars,kode_status,' . $this->selectedId,
        'status' => 'required',
        'penjelasan_status' => 'required',
    ]);

    if ($this->selectedId) {
        $record = StatusKamar::find($this->selectedId);
        if ($record) {
            $record->update([
                'kode_status' => $this->kode_status,
                'status' => $this->status,
                'penjelasan_status' => $this->penjelasan_status,
            ]);

            $this->resetInputFields();
        }
    }
}


    public function destroy($id)
    {
        if ($id) {
            $record = StatusKamar::where('id', $id)->first();
            if ($record) {
                $record->delete();
            }
        }
    }

    private function resetInputFields()
    {
        $this->kode_status = '';
        $this->status = '';
        $this->penjelasan_status = '';
    }
}