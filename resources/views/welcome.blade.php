<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especialista en Migraciones Legacy y Arquitectura Laravel</title>
    <!-- Bootstrap 5.3 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body>

    <!-- Hero Section -->
    <header class="bg-dark-custom text-white py-5 mb-5">
        <div class="container py-5 text-center">
            <span class="text-brand fw-bold text-uppercase tracking-wider" style="font-family: 'JetBrains Mono', monospace; font-size: 0.9rem;">
                Consultoría de Software de Alto Valor
            </span>
            <h1 class="display-4 fw-extrabold mt-2 mb-3" style="letter-spacing: -1.5px;">
                Migración Segura de Software Legacy a <span class="text-brand">Laravel 12</span>
            </h1>
            <p class="lead text-secondary mx-auto" style="max-width: 700px; font-size: 1.15rem;">
                Transformo sistemas obsoletos en arquitecturas mantenibles, reactivas y de alto rendimiento. Mitigo riesgos, aseguro tus datos y elimino la deuda técnica.
            </p>
            <div class="mt-4">
                <a href="#contacto" class="btn btn-brand btn-lg px-4 py-2">Agendar Auditoría de Código</a>
            </div>
        </div>
    </header>

    <!-- Casos de Estudio Activos -->
    <main class="container mb-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold" style="letter-spacing: -1px;">Casos de Estudio e Impacto Técnico</h2>
            <p class="text-muted">Demostración práctica de cómo resuelvo problemas arquitectónicos complejos.</p>
        </div>

        <!-- Render de nuestro componente Livewire interactivo -->
        <livewire:project-portfolio />
    </main>

    <!-- Footer / Contacto -->
    <footer id="contacto" class="bg-white border-top py-5 text-center">
        <div class="container">
            <h3 class="fw-bold mb-3">¿Listo para modernizar tu infraestructura?</h3>
            <p class="text-muted mb-4">Disponible para consultorías arquitectónicas, auditorías de código y migraciones críticas.</p>
            <a href="mailto:quitze.in.rodriguez@gmail.com" class="btn btn-dark px-4 py-2" style="font-family: 'JetBrains Mono', monospace;">
                quitze.in.rodriguez@gmail.com
            </a>
        </div>
    </footer>

    @livewireScripts
    <!-- Bootstrap 5.3 JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
