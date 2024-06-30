<!-- resources/views/layouts/app.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manajemen Hotel') }}
            </h2>
        </div>
    </x-slot>

    <div class="flex">
        <!-- Sidebar -->
        <div class="full-height w-64 bg-gray-200 dark:bg-gray-900">
            <nav class="p-4">
                <ul>
                    <li class="mb-2">
                        <a href="#" class="sidebar-nav-link block py-2 px-4 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-800"
                           data-target="manage-kamar">
                            Kelola Kamar
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="sidebar-nav-link block py-2 px-4 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-800"
                           data-target="manage-status-kamar">
                            Kelola Status Kamar
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="#" class="sidebar-nav-link block py-2 px-4 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-800"
                           data-target="manage-tipe-kamar">
                            Kelola Tipe Kamar
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Content -->
        <div class="flex-1 py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Livewire Components -->
                        <div class="manage-kamar livewire-component active">
                            @livewire('managehotel.kamar.managekamar')
                        </div>
                        <div class="manage-status-kamar livewire-component hidden">
                            @livewire('managehotel.kamar.managestatuskamar')
                        </div>
                        <div class="manage-tipe-kamar livewire-component hidden">
                            <div>
                            <button type="button" class="btn btn-primary bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" id="btnTambahTipeKamar">
                                Tambah Tipe Kamar
                            </button>
                            </div>   
                            <div class="py-2">
                            @livewire('managehotel.kamar.tipe-kamar-index') 
                            </div>
                        </div>
                        <div class="tipe-kamar-create livewire-component hidden">
                            @livewire('managehotel.kamar.tipe-kamar-create')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        .livewire-component { display: none; }
        .livewire-component.active { display: block; }
        /* Add additional styles as needed */
    </style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const defaultComponent = document.querySelector('.manage-kamar');
        defaultComponent.classList.add('active');

        const links = document.querySelectorAll('.sidebar-nav-link');
        const components = document.querySelectorAll('.livewire-component');

        links.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const target = this.getAttribute('data-target');

                components.forEach(component => {
                    component.classList.remove('active');
                    if (component.classList.contains(target)) {
                        component.classList.add('active');
                    }
                });
            });
        });

        // Event listener for button inside manage-tipe-kamar
        const btnTambahTipeKamar = document.getElementById('btnTambahTipeKamar');
        if (btnTambahTipeKamar) {
            btnTambahTipeKamar.addEventListener('click', function() {
                const manageTipeKamar = document.querySelector('.manage-tipe-kamar');
                const tipeKamarCreate = document.querySelector('.tipe-kamar-create');

                manageTipeKamar.classList.remove('active');
                tipeKamarCreate.classList.add('active');
            });
        }
    });
</script>

</x-app-layout>
