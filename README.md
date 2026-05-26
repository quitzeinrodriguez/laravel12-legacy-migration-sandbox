# 🛠️ Laravel 12 Architecture & Legacy Migration Sandbox

Este repositorio es una prueba de concepto (PoC) que demuestra metodologías avanzadas para la migración y refactorización de software heredado (*legacy*) hacia arquitecturas modernas y escalables utilizando **Laravel 12**, **Livewire** y **PHP 8.2+**.

El código real de producción de mis clientes está protegido bajo acuerdos de confidencialidad (NDA). Por lo tanto, este entorno abstrae de forma pública los patrones arquitectónicos que utilizo para resolver problemas críticos de rendimiento, deuda técnica y bases de datos desnormalizadas.

---

## 🧠 Desafíos Técnicos Resueltos en este Sandbox

### 1. Refactorización de Modelos de Datos Complejos (EAV a Eloquent)
* **Problema Común (.legacy-source/database_dump.sql):** Sistemas antiguos que abusan del patrón Entity-Attribute-Value (EAV) o tablas desnormalizadas, generando bloqueos en la base de datos y consultas (`JOINs`) masivas que degradan el rendimiento.
* **Solución Aplicada:** Transición hacia **Relaciones Polimórficas de Eloquent** y optimización de índices. El mapeo permite mantener la flexibilidad del negocio reduciendo el tiempo de ejecución de las consultas en más de un 70%.

### 2. Sanitización y Tipado Estricto contra Inyecciones SQL
* **Problema Común (.legacy-source/Nefrologia.php):** Lógica de negocio dispersa en scripts planos, variables globales (`$_POST`) sin sanitizar y sentencias SQL construidas mediante concatenación de strings.
* **Solución Aplicada:** Implementación de **FormRequests** encapsulados para la validación estricta en la capa HTTP, y el uso de **PHP Enums** para asegurar la integridad de los estados y categorías del dominio, eliminando por completo los "strings mágicos".

### 3. Erradicación de Deuda Técnica en Frontend (jQuery -> Livewire)
* **Problema Común (.legacy-source/desempeno_fisico.php):** Interfaces reactivas construidas sobre miles de líneas de jQuery altamente acopladas al DOM, lo que genera fugas de memoria y pantallas difíciles de actualizar.
* **Solución Aplicada:** Migración modular a **Componentes Reactivos de Livewire** integrados con los estándares visuales de **Bootstrap 5.3**. Reactividad del lado del servidor con actualizaciones de UI atómicas sin añadir la sobrecarga arquitectónica de un framework SPA (Vue/React).

---

## ⚙️ Estándares Visuales y de UI/UX Aplicados
Todas las vistas del sistema se adhieren estrictamente a lineamientos profesionales de diseño industrial de software:
* **Tipografía:** Cuerpo de texto estilizado con `Plus Jakarta Sans` para optimizar la legibilidad de datos densos; bloques de código renderizados con `JetBrains Mono`.
* **Paleta:** Contraste sofisticado utilizando grises oscuros de escala técnica (`#18181b`) y acentos corporativos en el rojo característico de Laravel (`#FF2D20`).

---

## 🚀 Pruebas y Cobertura
El código moderno cuenta con pruebas automatizadas unitarias y de integración utilizando **Pest / PHPUnit** para asegurar que las reglas de negocio refactorizadas mantengan un comportamiento idéntico al sistema legacy original, garantizando **cero regresiones**.

```bash
php artisan test --coverage
```
