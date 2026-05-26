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
                'title' => 'Migración de Módulo de Diagnósticos Probables',
                'category' => MigrationCategory::DATABASE->value,
                'badge' => MigrationCategory::DATABASE,
                'legacy' => 'SQL Crudo, consultas desnormalizadas (EAV), acoplamiento severo.',
                'solution' => 'Rediseño a relaciones polimórficas de Eloquent y sanitización con FormRequests.',
                'impact' => 'Reducción del 60% en tiempo de procesamiento y código 100% tipado.',
                'tech' => ['Laravel 12', 'Eloquent', 'Livewire', 'PHP Enums'],
                'github_url' => 'https://github.com/quitzeinrodriguez/laravel12-legacy-migration-sandbox/blob/main/app/Models/Comment.php'
            ],
            [
                'title' => 'Refactorización del Módulo Desempeño Físico',
                'category' => MigrationCategory::UI_UX->value,
                'badge' => MigrationCategory::UI_UX,
                'legacy' => 'Lógica incrustada en la vista, dependencia masiva de jQuery y PHP antiguo.',
                'solution' => 'Migración total a componentes reactivos Livewire bajo Bootstrap 5.3.',
                'impact' => 'Eliminación del 100% de la deuda técnica de jQuery y carga de página instantánea.',
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
