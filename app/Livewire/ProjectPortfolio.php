<?php

namespace App\Livewire;

use Livewire\Component;
use App\Enums\MigrationCategory;

class ProjectPortfolio extends Component
{
    public ?string $selectedCategory = null;

    public function selectCategory(?string $category)
    {
        $this->selectedCategory = $category;
    }

    public function getProjects(): array
    {
        // Estructura de datos técnica simulando tus casos de estudio reales
        $allProjects = [
            [
                'title' => 'Migración de Módulo de Diagnósticos Críticos',
                'category' => MigrationCategory::DATABASE->value,
                'badge' => MigrationCategory::DATABASE,
                'legacy' => 'SQL Crudo, consultas desnormalizadas (EAV), acoplamiento severo de datos.',
                'solution' => 'Rediseño a relaciones polimórficas de Eloquent y sanitización avanzada con FormRequests.',
                'impact' => 'Reducción del 60% en tiempo de procesamiento y base de datos relacional limpia.',
                'tech' => ['Laravel 12', 'Eloquent', 'FormRequests', 'PHP Enums'],
                'github_url' => 'https://github.com/quitzeinrodriguez/laravel12-legacy-migration-sandbox/blob/main/app/Models/Comment.php'
            ],
            [
                'title' => 'Desacoplamiento de Monolito de Facturación',
                'category' => MigrationCategory::ARCHITECTURE->value,
                'badge' => MigrationCategory::ARCHITECTURE,
                'legacy' => 'Controladores "Dios" de 2,500 líneas con lógica de negocio, SQL y envíos de emails mezclados.',
                'solution' => 'Estructuración basada en Service Pattern, interfaces de abstracción y eventos asíncronos en cola (Queues).',
                'impact' => 'Código 100% testeable, controladores de menos de 30 líneas y procesos secundarios delegados al backend.',
                'tech' => ['Laravel 12', 'Service Pattern', 'Event Driven', 'Laravel Queues']
            ],
            [
                'title' => 'Optimización de Reportes Médicos Masivos',
                'category' => MigrationCategory::PERFORMANCE->value,
                'badge' => MigrationCategory::PERFORMANCE,
                'legacy' => 'Carga masiva de 80k registros en memoria provocando caídas del servidor por falta de RAM (Memory Exhausted).',
                'solution' => 'Procesamiento segmentado mediante Lazy Collections (Generadores PHP) y almacenamiento en caché por capas con Redis.',
                'impact' => 'Consumo de memoria RAM plano congelado en 12MB y reportes pesados generados en sub-segundos.',
                'tech' => ['Laravel 12', 'Redis', 'Lazy Collections', 'Query Optimization']
            ],
            [
                'title' => 'Refactorización del Módulo Desempeño Físico',
                'category' => MigrationCategory::UI_UX->value,
                'badge' => MigrationCategory::UI_UX,
                'legacy' => 'Lógica incrustada en la vista, dependencia masiva de jQuery heredado y mutaciones manuales del DOM.',
                'solution' => 'Migración total a componentes reactivos Livewire bajo Bootstrap 5.3 con tipografía Plus Jakarta Sans.',
                'impact' => 'Eliminación completa de la deuda técnica de jQuery y experiencia de usuario fluida sin frameworks SPA pesados.',
                'tech' => ['Laravel 12', 'Livewire', 'Bootstrap 5.3', 'JetBrains Mono'],
                'github_url' => 'https://github.com/quitzeinrodriguez/laravel12-legacy-migration-sandbox/blob/main/app/Livewire/PhysicalPerformance/MetricsTable.php'
            ]
        ];

        if (!$this->selectedCategory) {
            return $allProjects;
        }

        return array_filter($allProjects, function ($project) {
            return $project['category'] === $this->selectedCategory;
        });
    }

    public function render()
    {
        return view('livewire.project-portfolio', [
            'projects' => $this->getProjects(),
            'categories' => MigrationCategory::cases()
        ]);
    }
}
