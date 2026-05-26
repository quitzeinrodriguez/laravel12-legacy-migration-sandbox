<div>
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-4">Métricas de Desempeño Físico</h5>
            
            @if($this->metrics->isEmpty())
                <p class="text-muted">No hay métricas registradas para este paciente.</p>
            @else
                <ul class="list-group list-group-flush">
                    @foreach($this->metrics as $metric)
                        <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                            <span>Métrica de rendimiento</span>
                            <span class="badge bg-dark-custom rounded-pill">{{ $metric->valor }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>
