<div>
    <form wire:submit.prevent="save">
        <input type="text" wire:model="name" placeholder="Nama" required><br>
        @error('name') <span>{{ $message }}</span><br> @enderror

        <input type="email" wire:model="email" placeholder="Email" required><br>
        @error('email') <span>{{ $message }}</span><br> @enderror

        <input type="password" wire:model="password" placeholder="Password" required><br>
        @error('password') <span>{{ $message }}</span><br> @enderror

        <input type="text" wire:model="divisi" placeholder="Divisi" required><br>
        @error('divisi') <span>{{ $message }}</span><br> @enderror

        <button type="submit">Tambah Karyawan</button>
    </form>

    @if (session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif
</div>
