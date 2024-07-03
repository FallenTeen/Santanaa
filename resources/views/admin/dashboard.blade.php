<!-- resources/views/dashboard/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 dark:text-white-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-row">
                <div class="w-full sm:w-1/2 lg:w-1/2 xl:w-1/2 pr-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="font-bold text-xl py-1">Jumlah Visitor</div>
                            <div>Visitor Saat Ini: {{ $countVisitor }}</div>
                        </div>
                    </div>
                </div>
                <div class="w-full sm:w-1/2 lg:w-1/2 xl:w-1/2 pl-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="font-bold text-xl py-1">Laporan Pelanggan</div>
                            <div>Jumlah Laporan Menunggu Tindakan: {{ $countPendingReports }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-1 justify-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="flex flex-row">
                <div class="w-full pr-4">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="py-2">
                                <!-- Button to open modal -->
                                @livewire('wire-elements-modal')
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="Livewire.dispatch('openModal', { component: 'booking.create-booking' })">Tambah Booking</button>
                            </div>
                            <div>
                                <!-- Livewire component for listing bookings -->
                                @livewire('booking.index-booking')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Container -->
    <div x-data="{ modalOpen: false }" x-show="modalOpen" @keydown.escape.window="modalOpen = false"
         class="fixed inset-0 flex items-center justify-center z-50">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg p-8 max-w-lg mx-auto">
            <!-- Livewire component for creating a booking -->
            @livewire('booking.create-booking')
        </div>
    </div>

    <script src="{{ asset('js/alpinejs.js') }}" defer></script>
</x-app-layout>
