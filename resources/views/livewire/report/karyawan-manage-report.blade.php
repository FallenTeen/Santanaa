<!-- resources/views/livewire/report/karyawan-manage-report.blade.php -->

<div>
    <h2>Daftar Laporan</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Divisi</th>
                <th>Detail</th>
                <th>Ditugaskan Kepada</th>
                <th>Status</th>
                <th>Tindakan</th>
                <!-- Tambahkan kolom lain jika diperlukan -->
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $report->divisi }}</td>
                    <td>{{ $report->detail }}</td>
                    <td>{{ $report->assigned_to ? $karyawans->firstWhere('id', $report->assigned_to)->nama : 'Belum Ditindak' }}</td>
                    <td>{{ $report->aksi }}</td>
                    <td>
                        @if ($report->aksi == 'Menunggu Tindakan')
                        <button wire:click="takeAction({{ $report->id }})">Ambil Tindakan</button>
                        @elseif ($report->aksi == 'Tindakan Diambil')
                        <button wire:click="completeAction({{ $report->id }})">Selesai</button>
                        @endif
                    </td>
                    <!-- Tambahkan sel lain sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
