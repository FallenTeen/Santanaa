<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function dashboard(){
      return view('admin.dashboard');
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
