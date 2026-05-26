<!-- Bloques de scripts spaghetti que dificultan el mantenimiento -->
<div id="metricas-contenedor"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $.ajax({
        url: 'get_metrics.php?modulo=desempeno',
        success: function(data) {
            $('#metricas-contenedor').html('<p>' + data.valor + '</p>');
        }
    });
</script>
