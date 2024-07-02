<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <table class="min-w-full bg-white shadow-md rounded">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-3 px-4">Kode Status</th>
                <th class="py-3 px-4">Status</th>
                <th class="py-3 px-4">Deskripsi</th>
                <th class="py-3 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach($statusKamar as $status)
            <tr>
                <td class="py-3 px-4">{{ $status->kode_status }}</td>
                <td class="py-3 px-4">{{ $status->status }}</td>
                <td class="py-3 px-4">{{ $status->penjelasan_status }}</td>
                <td class="py-3 px-4 flex justify-center items-center">
                    <div class="px-2">
                        <button wire:click="edit({{ $status->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Edit
                        </button>
                    </div>
                    <div class="px-2">
                        <button wire:click="destroy({{ $status->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Hapus
                        </button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
