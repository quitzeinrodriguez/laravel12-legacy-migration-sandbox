<?php

namespace App\Livewire\PhysicalPerformance;

use Livewire\Component;
use App\Models\PerformanceMetric;

class MetricsTable extends Component
{
    public int $patientId;

    public function getMetricsProperty()
    {
        return PerformanceMetric::where('patient_id', $this->patientId)->latest()->get();
    }

    public function render()
    {
        return view('livewire.physical-performance.metrics-table');
    }
}
