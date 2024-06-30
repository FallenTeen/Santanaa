<!-- resources/views/dashboard/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
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
                            <div>Visitor Saat Ini: </div>
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
                            <div>
                                @livewire('booking.buat-reservasi')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
