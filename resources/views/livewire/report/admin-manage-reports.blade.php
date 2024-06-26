<!-- resources/views/livewire/report/admin-manage-reports.blade.php -->

<div>
    <h2>Admin: Manage Reports</h2>

    <!-- Form untuk menambah laporan -->
    <form wire:submit.prevent="create">
        <div>
            <label for="divisi">Divisi:</label>
            <select wire:model="divisi" id="divisi">
                <option value="">Pilih Divisi</option>
                <option value="Engineering">Engineering</option>
                <option value="Security">Security</option>
            </select>
            @error('divisi') <span>{{ $message }}</span> @enderror
        </div>
        <div>
            <label for="detail">Detail:</label>
            <textarea wire:model="detail" id="detail"></textarea>
            @error('detail') <span>{{ $message }}</span> @enderror
        </div>

        <button type="submit">Tambah Laporan</button>
    </form>

    <hr>

    <!-- Tabel untuk menampilkan daftar laporan -->
    <table>
        <thead>
            <tr>
                <th>ID Laporan</th>
                <th>Divisi</th>
                <th>Detail</th>
                <th>Aksi</th>
                <th>Ditindak Oleh</th>
                <th>Tindakan</th>
                <th>Dibuat Pada</th>
                <th>Ditindak Pada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->id }}</td>
                <td>{{ $report->divisi }}</td>
                <td>{{ $report->detail }}</td>
                <td>{{ $report->aksi }}</td>
                <td>{{ $report->assigned_to ? $karyawans->firstWhere('id', $report->assigned_to)->nama : 'Belum Ditindak' }}</td>
                <td>
                    @if ($report->aksi == 'Menunggu Tindakan')
                    <button wire:click="selectReport({{ $report->id }})">Pilih Aksi</button>
                    @endif
                    @if ($report->aksi == 'Tindakan Diambil')
                    <button wire:click="completeAction({{ $report->id }})">Selesai</button>
                    @endif
                    <button wire:click="showDetail({{ $report->id }})">Detail</button>
                    <button wire:click="delete({{ $report->id }})">Hapus</button>
                </td>
                <td>{{ $report->created_at }}</td>
                <td>{{ $report->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Form untuk mengambil tindakan -->
    @if($selectedReport)
    <div>
        <h3>Ambil Tindakan untuk Laporan ID {{ $selectedReport->id }}</h3>
        <form wire:submit.prevent="takeAction">
            <div>
                <label for="karyawan">Pilih Karyawan:</label>
                <select wire:model="karyawanId" id="karyawan">
                    <option value="">Pilih Karyawan</option>
                    @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                    @endforeach
                </select>
                @error('karyawanId') <span>{{ $message }}</span> @enderror
            </div>
            <button type="submit">Ambil Tindakan</button>
        </form>
    </div>
    @endif
</div>
