<?php

namespace App\Livewire\Managekaryawan;

use Livewire\Component;
use App\Models\Karyawan;

class Managekaryawan extends Component
{
        public $karyawans, $nama, $divisi, $notelp, $karyawan_id;
        public $isOpen = false;
        public function render()
        {
            if ($this->isOpen) {
                if (view()->exists('livewire.managekaryawan.karyawan-create')) {
                    // File view ditemukan
                    return view('livewire.managekaryawan.karyawan-create');
                } else {
                    // File view tidak ditemukan, menangani kasus ini sesuai kebutuhan
                    abort(404, 'View "livewire.managekaryawan.karyawan-create" not found.');
                }
            } else {
                // $this->isOpen == false
                $this->karyawans = Karyawan::all();
                return view('livewire.managekaryawan.managekaryawan');
            }
        }
    
        public function create(){
            $this->resetInputFields();
            $this->openModal();
        }
    
        public function openModal(){
            $this->isOpen = true;
        }
    
        public function closeModal(){
            $this->isOpen = false;
        }
        private function resetInputFields(){
            $this->karyawan_id = '';
            $this->nama = '';
            $this->divisi = '';
            $this->notelp = '';
        }
        public function store(){
            $this->validate([
                'nama' =>'required',
                'divisi' =>'required',
                'notelp' =>'required',
            ]);
    
            Karyawan::updateOrCreate(['id' => $this->karyawan_id],[
                'nama' => $this->nama,
                'divisi' => $this->divisi,
                'notelp' => $this->notelp,
            ]);
    
            session()->flash('message', $this->karyawan_id ? 'Karyawan Berhasil Diupdate' : 'Karyawan Berhasil Ditambahkan');
    
            $this->closeModal();
            $this->resetInputFields();
        }
        public function edit($id)
        {
            $karyawan = Karyawan::findOrFail($id);
            $this->karyawan_id = $id;
            $this->nama = $karyawan->nama;
            $this->divisi = $karyawan->divisi;
            $this->notelp = $karyawan->notelp;
    
            $this->openModal();
        }
    
        public function delete($id)
        {
            Karyawan::find($id)->delete();
            session()->flash('message', 'Karyawan Deleted Successfully.');
        }
}
