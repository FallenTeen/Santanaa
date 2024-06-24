<!-- resources/views/livewire/managekaryawan.blade.php -->

<div>
    <div class="container mt-1">
        <div class="row mb-3">
            <div class="col-md-6 align-items-sm-end">
                <button wire:click="create()" class="btn btn-primary">Tambah Karyawan</button>
            </div>
        </div>

        @if($isOpen)
            @include('managekaryawan.karyawan-create')
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">No. Telp</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($karyawans as $karyawan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $karyawan->nama }}</td>
                                <td>{{ $karyawan->divisi }}</td>
                                <td>{{ $karyawan->notelp }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button wire:click="edit({{ $karyawan->id }})" class="btn btn-sm btn-primary">Edit</button>
                                        <button wire:click="delete({{ $karyawan->id }})" class="btn btn-sm btn-danger">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Penyesuaian gaya untuk tabel */
        .table-responsive {
            overflow-x: auto; /* Scroll horizontal jika terlalu lebar */
        }

        .table {
            width: 100%; /* Lebar tabel 100% dari container */
        }

        .btn-group {
            white-space: nowrap; /* Menghindari pemisahan tombol aksi ke baris baru */
        }
    </style>
</div>
