<div>
    <!-- Filtros Interactivos -->
    <div class="d-flex flex-wrap gap-2 mb-5 justify-content-center">
        <button 
            wire:click="selectCategory(null)" 
            class="btn btn-sm {{ is_null($selectedCategory) ? 'btn-brand' : 'btn-outline-secondary' }}">
            Todos los proyectos
        </button>
        @foreach($categories as $category)
            <button 
                wire:click="selectCategory('{{ $category->value }}')" 
                class="btn btn-sm {{ $selectedCategory === $category->value ? 'btn-brand' : 'btn-outline-secondary' }}">
                {{ $category->value }}
            </button>
        @endforeach
    </div>

    <!-- Grid de Proyectos -->
    <div class="row g-4">
        @foreach($projects as $project)
            <div class="col-md-6" wire:key="{{ Str::slug($project['title']) }}">
                <div class="card h-100 shadow-sm border-0 bg-white">
                    <div class="card-body p-4 d-flex flex-column">
                        <span class="badge bg-dark-custom mb-3 align-self-start px-2 py-1" style="font-size: 0.75rem;">
                            {{ $project['badge']->value }}
                        </span>
                        <h4 class="card-title fw-bold mb-3" style="letter-spacing: -0.5px;">{{ $project['title'] }}</h4>
                        
                        <div class="mb-3">
                            <strong class="text-danger" style="font-size: 0.85rem; text-transform: uppercase;">✕ Estado Legacy:</strong>
                            <p class="text-muted small mb-2">{{ $project['legacy'] }}</p>
                            
                            <strong class="text-success" style="font-size: 0.85rem; text-transform: uppercase;">✓ Solución Laravel 12:</strong>
                            <p class="text-muted small mb-2">{{ $project['solution'] }}</p>
                            
                            <strong class="text-brand" style="font-size: 0.85rem; text-transform: uppercase;">⚡ Impacto:</strong>
                            <p class="fw-semibold small mb-0 text-dark">{{ $project['impact'] }}</p>
                        </div>

                        <div class="mt-auto pt-3 border-top d-flex flex-wrap gap-1">
                            @foreach($project['tech'] as $tech)
                                <span class="badge bg-light text-dark border px-2 py-1" style="font-family: 'JetBrains Mono', monospace; font-size: 0.7rem;">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
