<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class KaryawanController extends Controller
{
    
    public function dashboard(){
        $countPendingReports = Report::where('aksi', 'Tindakan Diambil')->count();
        return view('karyawan.dashboard', ['countPendingReports' => $countPendingReports]);
     }
    public function viewreport(){
        return view('karyawan.viewreport');
     }
}
