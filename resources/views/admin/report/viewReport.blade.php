<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white-800 dark:text-white-200 leading-tight">
            {{ __('Laporan Pelanggan') }}
        </h2>
    </x-slot>
        <div class="p-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  @livewire('report.admin-manage-reports')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
