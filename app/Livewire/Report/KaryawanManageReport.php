<?php

namespace App\Livewire\Report;

use Livewire\Component;
use App\Models\Report;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;

class KaryawanManageReport extends Component
{
    public $reports, $karyawans;

    public function mount()
    {
        $this->loadReports();
        $this->karyawans = Karyawan::all(); // Inisialisasi $karyawans dengan semua data karyawan
    }

    public function loadReports()
    {
        $user = Auth::user();
        if ($user && $user->karyawan) {
            $karyawanId = $user->karyawan->id; // Mendapatkan id karyawan yang sedang login
            $this->reports = Report::where('assigned_to', $karyawanId)->get();
        } else {
            $this->reports = collect(); // Jika tidak ada karyawan yang terkait, beri koleksi kosong
        }
    }

    public function render()
    {
        return view('livewire.report.karyawan-manage-report', [
            'reports' => $this->reports,
            'karyawans' => $this->karyawans, // Kirim $karyawans ke view
        ]);
    }
    public function completeAction($reportId){
        $report = Report::find($reportId);
        if ($report) {
            $report->aksi = 'Selesai Ditindak';
            $report->save();
            $this->loadReports();
        }
    }
}
