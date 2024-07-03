<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Booking;
class AdminController extends Controller
{
   public $showModal = false;

   public function showModal(){
      $this->showModal = true;
   }
   
   public function dashboard(){
      $countVisitor = Booking::count();  //Menghitung jumlah pengunjung yang menunggu konfirmasi  //menggunakan Eloquent ORM Laravel  //Jika ingin menggunakan query builder Laravel, maka gunakan Booking::where('status', 'Menunggu Konfirmasi')->count();
      $countPendingReports = Report::where('aksi', 'Menunggu Tindakan')->count();
      return view('admin.dashboard', [
         'countPendingReports' => $countPendingReports,
         'countVisitor'=>$countVisitor,
     ]);
   }
   public function viewHotels(){
    return view('admin.hotel.viewHotels');
   }
   public function viewReport(){
      return view('admin.report.viewreport');
   }
   public function viewKaryawan(){
      return view('admin.karyawan.viewkaryawan');
   }

}
