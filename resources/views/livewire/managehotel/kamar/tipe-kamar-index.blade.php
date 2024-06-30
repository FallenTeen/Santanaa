<!-- resources/views/livewire/managehotel/kamar/managetipekamar-index.blade.php -->

<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <table class="min-w-full bg-white shadow-md rounded">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-3 px-4">Kode Tipe</th>
                <th class="py-3 px-4">Tipe</th>
                <th class="py-3 px-4">Penjelasan Tipe</th>
                <th class="py-3 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach($tipeKamar as $tipe)
            <tr>
                <td class="py-3 px-4">{{ $tipe->kode_tipe }}</td>
                <td class="py-3 px-4">{{ $tipe->tipe }}</td>
                <td class="py-3 px-4">{{ $tipe->penjelasan_tipe }}</td>
                <td class="py-3 px-4">
                    <button wire:click="edit({{ $tipe->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Edit
                    </button>
                    <button wire:click="destroy({{ $tipe->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Hapus
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
