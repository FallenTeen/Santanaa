<div>
    <form wire:submit.prevent="store">
        <input type="text" wire:model="kode_status" placeholder="Kode Status">
        <input type="text" wire:model="status" placeholder="Status">
        <textarea wire:model="penjelasan_status" placeholder="Penjelasan Status"></textarea>
        <button type="submit">Simpan</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Kode Status</th>
                <th>Status</th>
                <th>Penjelasan Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($statusKamar as $status)
            <tr>
                <td>{{ $status->kode_status ??''}}</td>
                <td>{{ $status->status ?? ''}}</td>
                <td>{{ $status->penjelasan_status ?? '' }}</td>
                <td>
                    <button wire:click="edit({{ $status->id ?? ''}})">Edit</button>
                    <button wire:click="destroy({{ $status->id ?? ''}})">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
