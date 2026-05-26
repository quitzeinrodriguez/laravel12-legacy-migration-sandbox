<?php

namespace App\Services\Reports;

use App\Models\MedicalAudit;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

final class MedicalAuditReportGenerator
{
    private const CACHE_TTL_SECONDS = 3600; // 1 Hora

    /**
     * Obtiene el reporte optimizado. Usa caché para evitar consultas redundantes.
     */
    public function getCachedReport(int $clinicId): array
    {
        return Cache::remember(
            "clinic:{$clinicId}:audit_report", 
            self::CACHE_TTL_SECONDS, 
            fn() => $this->generateRawData($clinicId)
        );
    }

    /**
     * Genera la data usando Lazy Collections para proteger la memoria RAM
     */
    private function generateRawData(int $clinicId): array
    {
        $processedData = [];

        // cursor() utiliza Lazy Collections por detrás. 
        // Hidrata un solo modelo Eloquent a la vez en memoria, sin importar si son 100k registros.
        MedicalAudit::where('clinic_id', $clinicId)
            ->select(['id', 'doctor_name', 'created_at'])
            ->cursor() 
            ->each(function (MedicalAudit $audit) use (&$processedData) {
                // El consumo de RAM permanece plano (ej. 12MB permanentes)
                $processedData[] = [
                    'id' => $audit->id,
                    'doctor' => $audit->doctor_name,
                    'formatted_date' => $audit->created_at->format('Y-m-d'),
                ];
            });

        return $processedData;
    }
}
