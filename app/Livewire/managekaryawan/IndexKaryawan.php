<?php
namespace App\Livewire\Managekaryawan;

use Livewire\Component;
use App\Models\Karyawan;
use App\Models\User;

class IndexKaryawan extends Component
{
    public $editId, $editNama, $editEmail, $editDivisi;
    public function render()
    {
        $karyawans = Karyawan::with('user')->get();
        return view('livewire.managekaryawan.indexkaryawan', ['karyawans' => $karyawans]);
    }

    public function edit($id)
    {
        $karyawan = Karyawan::find($id);
        if ($karyawan) {
            $this->editId = $karyawan->id;
            $this->editNama = $karyawan->nama;
            $this->editEmail = $karyawan->email;
            $this->editDivisi = $karyawan->divisi;
        }
    }

    public function update()
    {
        $validatedData = $this->validate([
            'editNama' => 'required|string',
            'editEmail' => 'required|email',
            'editDivisi' => 'required|string'
        ]);

        $karyawan = Karyawan::find($this->editId);
        if ($karyawan) {
            // Update data pada tabel karyawans
            $karyawan->nama = $validatedData['editNama'];
            $karyawan->email = $validatedData['editEmail'];
            $karyawan->divisi = $validatedData['editDivisi'];
            $karyawan->save();

            // Periksa dan update data pada tabel users (jika terhubung)
            if ($karyawan->user) {
                $user = $karyawan->user;
                $user->name = $validatedData['editNama'];
                $user->email = $validatedData['editEmail'];
                $user->save();
            } else {
            }

            session()->flash('message', 'Karyawan dan data User berhasil diupdate.');
        }
    }

    public function delete($id)
    {
        $karyawan = Karyawan::find($id);
        if ($karyawan) {
            // Hapus terlebih dahulu user jika perlu
            if ($karyawan->user) {
                $karyawan->user->delete();
            }

            $karyawan->delete();
            session()->flash('message', 'Karyawan berhasil dihapus.');
        }
    }
}
