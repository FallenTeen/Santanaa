<div>
    <h1>Data Karyawan</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Divisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
                <tr>
                    <td>{{ $karyawan->nama }}</td>
                    <td>{{ $karyawan->email }}</td>
                    <td>{{ $karyawan->divisi }}</td>
                    <td>
                        <button wire:click="edit({{ $karyawan->id }})" wire:loading.attr="disabled">Edit</button>
                        <button wire:click="delete({{ $karyawan->id }})" wire:loading.attr="disabled">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal Edit -->
    @if ($editId)
        <div class="modal" id="editModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form wire:submit.prevent="update">
                        <div class="modal-body">
                            <input type="hidden" wire:model="editId">
                            <div class="form-group">
                                <label for="editNama">Nama</label>
                                <input type="text" class="form-control" id="editNama" wire:model.defer="editNama" required>
                                @error('editNama') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="editEmail">Email</label>
                                <input type="email" class="form-control" id="editEmail" wire:model.defer="editEmail" required>
                                @error('editEmail') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="editDivisi">Divisi</label>
                                <input type="text" class="form-control" id="editDivisi" wire:model.defer="editDivisi" required>
                                @error('editDivisi') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>

@push('scripts')
    <script>
        Livewire.on('karyawanUpdated', () => {
            $('#editModal').modal('hide'); // Menutup modal setelah update
            Livewire.emit('refreshTable'); // Emit event untuk memperbarui tabel karyawan
        });

        Livewire.on('editDataUpdated', (data) => {
            // Memasukkan data yang diupdate kembali ke dalam form modal
            $('#editNama').val(data.editNama);
            $('#editEmail').val(data.editEmail);
            $('#editDivisi').val(data.editDivisi);
        });
    </script>
@endpush
