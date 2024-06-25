<div>
    <form wire:submit.prevent="store">
        <select wire:model="tipe_kamar_id">
            <option value="">Pilih Tipe Kamar</option>
            @foreach($tipeKamar as $tipeKamar)
                <option value="{{ $tipeKamar->id }}">{{ $tipeKamar->tipe }}</option>
            @endforeach
        </select>
        <select wire:model="status_kamar_id">
            <option value="">Pilih Status Kamar</option>
            @foreach($statusKamar as $statusKamar)
                <option value="{{ $statusKamar->id }}">{{ $statusKamar->status }}</option>
            @endforeach
        </select>
        <input type="text" wire:model="nomor" placeholder="Nomor Kamar">
        <input type="number" wire:model="lantai" placeholder="Lantai">
        <input type="number" wire:model="kapasitas" placeholder="Kapasitas">
        <input type="number" wire:model="harga" placeholder="Harga">
        <textarea wire:model="deskripsi_singkat" placeholder="Deskripsi Singkat"></textarea>
        <button type="submit">Simpan</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Tipe Kamar</th>
                <th>Status Kamar</th>
                <th>Nomor</th>
                <th>Lantai</th>
                <th>Kapasitas</th>
                <th>Harga</th>
                <th>Deskripsi Singkat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kamar as $kamar)
            <tr>
                <td>{{ $kamar->tipeKamar->tipe }}</td>
                <td>{{ $kamar->statusKamar->status }}</td>
                <td>{{ $kamar->nomor }}</td>
                <td>{{ $kamar->lantai }}</td>
                <td>{{ $kamar->kapasitas }}</td>
                <td>{{ $kamar->harga }}</td>
                <td>{{ $kamar->deskripsi_singkat }}</td>
                <td>
                    <button wire:click="edit({{ $kamar->id }})">Edit</button>
                    <button wire:click="destroy({{ $kamar->id }})">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
