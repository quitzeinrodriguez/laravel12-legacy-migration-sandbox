<?php

namespace App\Enums;

enum MigrationCategory: string
{
    case DATABASE = 'Refactorización de Base de Datos';
    case ARCHITECTURE = 'Modernización Arquitectónica';
    case UI_UX = 'Optimización UI/UX';
    case PERFORMANCE = 'Optimización de Rendimiento';
}
