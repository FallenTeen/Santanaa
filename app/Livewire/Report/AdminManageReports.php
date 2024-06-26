<?php

namespace App\Livewire\Report;

use Livewire\Component;
use App\Models\Report;
use App\Models\Karyawan;

class AdminManageReports extends Component
{
    public $reports, $divisi, $detail, $selectedReport, $karyawanId;
    public $aksi, $karyawans;

    protected $rules = [
        'divisi' => 'required',
        'detail' => 'required',
    ];

    public function mount()
    {
        $this->karyawans = Karyawan::all();
        $this->reports = Report::all();
        $this->karyawanId = null; // Initialize karyawanId
    }

    public function create()
    {
        $this->validate();

        Report::create([
            'divisi' => $this->divisi,
            'detail' => $this->detail,
            'aksi' => 'Menunggu Tindakan',
        ]);

        $this->resetInputFields();

        $this->reports = Report::all();
    }

    public function takeAction()
    {
        if ($this->selectedReport && $this->karyawanId) {
            $this->selectedReport->aksi = 'Tindakan Diambil';
            $this->selectedReport->assigned_to = $this->karyawanId;
            $this->selectedReport->save();
            $this->selectedReport = null;

            $this->reports = Report::all();
        }
    }

    public function selectReport($reportId)
    {
        $this->selectedReport = Report::find($reportId);
        $this->divisi = $this->selectedReport->divisi;
        $this->detail = $this->selectedReport->detail;
        $this->aksi = $this->selectedReport->aksi;
        $this->karyawanId = $this->selectedReport->assigned_to;
    }

    public function completeAction($reportId){
        $report = Report::find($reportId);
        if ($report) {
            $report->aksi = 'Selesai Ditindak';
            $report->save();
            $this->reports = Report::all();
        }
    }

    public function delete($reportId)
    {
        $report = Report::find($reportId);
        if ($report) {
            $report->delete();
            $this->reports = Report::all();
        }
    }

    public function showDetail($reportId)
    {
        $this->selectedReport = Report::find($reportId);
    }

    public function countPendingReports()
    {
        return Report::where('aksi', 'Menunggu Tindakan')->count();
    }


    private function resetInputFields()
    {
        $this->divisi = '';
        $this->detail = '';
        $this->karyawanId = null; // Reset karyawanId
    }

    public function render()
    {
        return view('livewire.report.admin-manage-reports', [
            'karyawans' => $this->karyawans,
        ]);
    }
}
