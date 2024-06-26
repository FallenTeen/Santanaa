<div>
    <h2>Daftar Laporan</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Divisi</th>
                <th>Detail</th>
                <th>Ditugaskan Kepad</th>
                <th>Status</th>
                <!-- Tambahkan kolom lain jika diperlukan -->
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
                <tr>
                    <td>{{ $report->divisi }}</td>
                    <td>{{ $report->detail }}</td>
                    <td>{{ $report->assigned_to }}</td>
                    <td>{{ $report->aksi }}</td>
                    <!-- Tambahkan sel lain sesuai kebutuhan -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
