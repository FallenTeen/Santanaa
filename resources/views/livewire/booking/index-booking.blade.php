<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif

    <table class="min-w-full bg-white shadow-md rounded">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="py-3 px-4">ID Reservasi</th>
                <th class="py-3 px-4">Nama Tamu</th>
                <th class="py-3 px-4">Jumlah Tamu</th>
                <th class="py-3 px-4">Nomor Kamar</th>
                <th class="py-3 px-4">Down Payment</th>
                <th class="py-3 px-4">Tanggal Reservasi</th>
                <th class="py-3 px-4">Tanggal Check-In</th>
                <th class="py-3 px-4">Tanggal Check-Out</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach($booking as $book)
            <tr>
                <td class="py-3 px-4">{{ $book->id }}</td>
                <td class="py-3 px-4">{{ $book->guest->nama}}</td>
                <td class="py-3 px-4">{{ $book->jumlah_tamu}}</td>
                <td class="py-3 px-4">{{ $book->kamar->nomor }}</td>
                <td class="py-3 px-4">{{ $book->dp_amount }}</td>
                <td class="py-3 px-4">{{ $book->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
