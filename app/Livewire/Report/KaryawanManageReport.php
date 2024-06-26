<?php

namespace App\Livewire\Report;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class KaryawanManageReport extends Component
{
    public $reports;
    public function mount(){
        $this->loadReports();
    }

    public function loadReports(){
        $user = Auth::user();
        if ($user) {
            $this->reports = Report::all();
        }
    }
    public function render()
    {
        return view('livewire.report.karyawan-manage-report',['reports' => $this->reports,]);
    }
}
