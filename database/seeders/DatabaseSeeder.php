<?php

namespace Database\Seeders;

use App\Models\StatusKamar;
use App\Models\TipeKamar;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create users
        User::insert([
            [
                'name' => 'Harry Ann',
                'email' => 'admin@gmail.com',
                'role' => 1,
                'password' => bcrypt('123456789'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Johnny Depp',
                'email' => 'user@gmail.com',
                'role' => 3,
                'password' => bcrypt('123456789'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],  
        ]);

        // Create status kamar
        StatusKamar::insert([
            [
                'kode_status' => 'VAC',
                'status' => 'VACANT',
                'penjelasan_status' => 'Vacant adalah istilah yang digunakan untuk menggambarkan sesuatu yang tidak terisi atau tidak digunakan pada saat ini. Ini bisa merujuk pada ruang yang kosong dan tidak dihuni, posisi pekerjaan yang belum terisi, atau properti yang belum ditempati atau digunakan untuk tujuan tertentu. Dalam konteks umum, "vacant" menunjukkan kekosongan atau keadaan yang tidak terpakai saat ini dan tersedia untuk digunakan atau diisi oleh orang atau barang lainnya.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_status' => 'OCC',
                'status' => 'OCCUPIED',
                'penjelasan_status' => 'Occupied adalah istilah yang digunakan untuk menggambarkan sesuatu yang sudah terisi atau digunakan saat ini. Ini bisa merujuk pada kamar atau ruang yang sudah ditempati oleh orang atau barang tertentu.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_status' => 'RES',
                'status' => 'RESERVED',
                'penjelasan_status' => 'Reserved adalah istilah yang digunakan untuk menggambarkan sesuatu yang sudah dipesan atau dijadwalkan untuk digunakan dalam waktu mendatang, meskipun belum terisi pada saat ini.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_status' => 'OUT',
                'status' => 'OUT OF SERVICE',
                'penjelasan_status' => 'Out of Service adalah istilah yang digunakan untuk menggambarkan sesuatu yang sedang tidak beroperasi atau tidak tersedia untuk digunakan saat ini, mungkin karena perbaikan atau pemeliharaan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_status' => 'CLEAN',
                'status' => 'CLEANING IN PROGRESS',
                'penjelasan_status' => 'Cleaning in Progress adalah istilah yang digunakan untuk menggambarkan bahwa kamar sedang dibersihkan saat ini dan tidak tersedia untuk digunakan sementara waktu.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        // Create tipe kamar
        TipeKamar::insert([
            [
                'kode_tipe' => 'LUX',
                'tipe' => 'Luxury',
                'penjelasan_tipe' =>'Tipe kamar luxury di Hotel Santana menawarkan pengalaman menginap yang luar biasa bagi tamu yang menginginkan kemewahan dan kenyaman dengan fasilitas mewah.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_tipe' => 'ROY',
                'tipe' => 'Suite Royal',
                'penjelasan_tipe' => 'Suite Royal adalah pilihan ideal bagi tamu yang menginginkan ruang yang luas dengan desain interior yang elegan dan fasilitas eksklusif. Dilengkapi dengan tempat tidur king-size, area ruang tamu terpisah, dan kamar mandi mewah dengan bak mandi berendam.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_tipe' => 'PRE',
                'tipe' => 'Premium',
                'penjelasan_tipe' => 'Kamar Premium menawarkan kenyamanan modern dengan pemandangan yang memukau. Fasilitas termasuk tempat tidur queen-size, area kerja, dan akses eksklusif ke fasilitas spa hotel.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_tipe' => 'FAM',
                'tipe' => 'Family Suite',
                'penjelasan_tipe' => 'Family Suite cocok untuk keluarga yang mencari penginapan yang nyaman. Dilengkapi dengan kamar tidur tambahan untuk anak-anak, ruang tamu terpisah, dan akses ke fasilitas kolam renang anak-anak.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_tipe' => 'DEL',
                'tipe' => 'Deluxe Room',
                'penjelasan_tipe' => 'Deluxe Room adalah pilihan yang sempurna untuk tamu yang menginginkan kenyamanan ekstra dengan harga terjangkau. Dilengkapi dengan tempat tidur yang nyaman, area kerja, dan pemandangan kota yang menakjubkan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'kode_tipe' => 'SPA',
                'tipe' => 'Spa Suite',
                'penjelasan_tipe' => 'Spa Suite menawarkan kombinasi sempurna antara relaksasi dan kemewahan. Dilengkapi dengan fasilitas spa pribadi, tempat tidur king-size, dan ruang bersantai yang tenang.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
