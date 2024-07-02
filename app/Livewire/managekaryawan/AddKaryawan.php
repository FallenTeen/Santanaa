<?php

namespace App\Livewire\Managekaryawan;

use Livewire\Component;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AddKaryawan extends Component
{
    public $name, $email, $password, $divisi, $alamat, $notelp;
    protected $rules = [
        'name' => 'required|string',
        'notelp' => 'required|string',
        'alamat' => 'required|string',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
        'divisi' => 'required|string',
    ];
    public function render()
    {
        return view('livewire.managekaryawan.addkaryawan');
    }

    public function save()
    {
        $validatedData = $this->validate();


        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->role = 2; // Role 2 untuk karyawan
        $user->password = Hash::make($validatedData['password']);
        $user->save();

        $karyawan = new Karyawan();
        $karyawan->nama = $validatedData['name'];
        $karyawan->notelp = $validatedData['notelp'];
        $karyawan->alamat = $validatedData['alamat'];
        $karyawan->email = $validatedData['email'];
        $karyawan->divisi = $validatedData['divisi'];
        $karyawan->save();

        $user->karyawan()->save($karyawan);
        session()->flash('message', 'Karyawan berhasil ditambahkan.');

        $this->reset();
    }
}

