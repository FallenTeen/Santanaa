<?php

namespace App\Livewire\Report;

use Livewire\Component;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class UserInputReport extends Component
{
    public $reports, $divisi, $detail, $selectedReport;

    protected $rules = [
        'divisi' => 'required',
        'detail' => 'required',
    ];

    public function mount()
    {
        $this->resetInputFields();
        $this->loadReports();
    }

    public function create()
    {
        $this->validate();

        $report = new Report();
        $report->divisi = $this->divisi;
        $report->detail = $this->detail;
        $report->pelapor = Auth::user()->id; // Ensure this matches the column name and definition in your database
        $report->save();

        session()->flash('message', 'Laporan berhasil disimpan.');
        $this->resetInputFields();
        $this->loadReports();
    }

    public function showDetail($reportId)
    {
        $this->selectedReport = Report::find($reportId);
    }

    public function resetInputFields()
    {
        $this->divisi = '';
        $this->detail = '';
    }

    public function loadReports()
    {
        $user = Auth::user();
        if ($user && Auth::check()) {
            $this->reports = Report::where('pelapor', $user->id)->get();
        } else {
            $this->reports = collect();
        }
    }

    public function render()
    {
        return view('livewire.report.user-input-report', [
            'reports' => $this->reports,
        ]);
    }
}
