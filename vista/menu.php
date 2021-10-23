<div id="menu">
<button type="button" class="btn btn-primary" id="historialAg" onclick="historialAg()">Historial de Registros <i class="fa fa-history"></i></button>

<button type="button" class="btn btn-primary" id="salir" onclick="salir()">Salir <i class="fa fa-sign-out"></i></button>
</div>
<!--****************Este es un documento tipo javascript-->
<script type="text/javascript">
    function historialAg(){window.location="?c=cobrador&a=genTablaDeAgregados"}
    function salir(){window.location = "?c=cobrador&a=salir"};
</script>