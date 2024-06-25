<div>
    <form wire:submit.prevent="store">
        <input type="text" wire:model="kode_tipe" placeholder="Kode Tipe">
        <input type="text" wire:model="tipe" placeholder="Tipe">
        <textarea wire:model="penjelasan_tipe" placeholder="Penjelasan Tipe"></textarea>
        <button type="submit">Simpan</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Kode Tipe</th>
                <th>Tipe</th>
                <th>Penjelasan Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tipeKamar as $tipe)
            <tr>
                <td>{{ $tipe->kode_tipe }}</td>
                <td>{{ $tipe->tipe }}</td>
                <td>{{ $tipe->penjelasan_tipe }}</td>
                <td>
                    <button wire:click="edit({{ $tipe->id }})">Edit</button>
                    <button wire:click="destroy({{ $tipe->id }})">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
