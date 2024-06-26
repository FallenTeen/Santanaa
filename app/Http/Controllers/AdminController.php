<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class AdminController extends Controller
{
   public function dashboard(){
      $countPendingReports = Report::where('aksi', 'Menunggu Tindakan')->count();
      return view('admin.dashboard', [
         'countPendingReports' => $countPendingReports,
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
