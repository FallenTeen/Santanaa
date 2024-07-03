<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="px-2 py-3 text-xs leading-4 font-medium uppercase tracking-wider">ID Lap.</th>
                <th class="px-4 py-3 text-xs leading-4 font-medium uppercase tracking-wider">Divisi</th>
                <th class="px-8 py-3 text-xs leading-4 font-medium uppercase tracking-wider">Detail</th>
                <th class="px-6 py-3 text-xs leading-4 font-medium uppercase tracking-wider">Aksi</th>
                <th class="px-6 py-3 text-xs leading-4 font-medium uppercase tracking-wider">Ditindak Oleh</th>
                <th class="px-6 py-3 text-xs leading-4 font-medium uppercase tracking-wider">Tindakan</th>
                <th class="px-6 py-3 text-xs leading-4 font-medium uppercase tracking-wider">Dibuat Pada</th>
                <th class="px-6 py-3 text-xs leading-4 font-medium uppercase tracking-wider">Ditindak Pada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr class="hover:bg-gray-50">
                <td class="px-2 py-4 whitespace-no-wrap">{{ $report->id }}</td>
                <td class="px-4 py-4 whitespace-no-wrap">{{ $report->divisi }}</td>
                <td class="px-8 py-4 whitespace-no-wrap">{{ $report->detail }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">{{ $report->aksi }}</td>
                <td class="px-6 py-4 whitespace-no-wrap text-center">
                    {{ $report->assigned_to ? $karyawans->firstWhere('id', $report->assigned_to)->nama : 'Belum Ditindak' }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap flex justify-center space-x-2">
                    @if ($report->aksi == 'Menunggu Tindakan')
                    <button wire:click="selectReport({{ $report->id }})"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none">Ambil
                        Tindakan</button>
                    @elseif ($report->aksi == 'Tindakan Diambil')
                    <button wire:click="completeAction({{ $report->id }})"
                        class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none">Selesai</button>
                    @endif
                    <button wire:click="showDetail({{ $report->id }})"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none">Detail</button>
                    <button wire:click="delete({{ $report->id }})"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded focus:outline-none">Hapus</button>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ $report->created_at }}</td>
                <td class="px-6 py-4 whitespace-no-wrap">{{ $report->updated_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
