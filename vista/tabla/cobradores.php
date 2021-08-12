</div>
</div>

<div id="contenidoTabla">
    <button type="button" class="btn btn-primary" id="Actualizar" onclick="Actualizar()">Actualizar</button>
    <label id="buscador">Buscar:<input id="busqueda" type="text" onkeyup="busqueda()"></label>
    <table id="cobradoresT" class="table table-hover">
        <thead class="thead-light">
            <tr>
                <th scope="col">CVE_COB </th>
                <th scope="col">OFICINA</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">ACTIVADO</th>
                <th scope="col">LIQUIDACIONES</th>
                <th scope="col">EDITAR</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($this->mCobradores as $regCob) : ?>
                <tr>

                    <td name="id"><?php echo $regCob->getcve_cob() ?></td>
                    <td name="id"><?php echo $regCob->getoficina() ?></td>
                    <td name="id"><?php echo $regCob->getnombre() ?></td>
                    <td name="id"><?php echo $regCob->getactivado() ?></td>
                    <td name="id"><?php echo $regCob->getliquidaciones() ?></td>
                    <td><a href="?c=cobrador&a=genTabla&CVE_COB=<?php echo $regCob->getcve_cob(); ?>" onclick="Editar()">Editar</a></td>
              </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</div>
<!--****************Este es un documento tipo javascript-->
<script type="text/javascript">
    //la funcion de busqueda ase una busqueda en la tabla y regresa los resultados
    function busqueda() {
        var tabla = document.getElementById('cobradoresT');
        var Pbusqueda = document.getElementById('busqueda').value.toLowerCase();
        for (var i = 1; i < tabla.rows.length; i++) {
            var cellsOfRow = tabla.rows[i].getElementsByTagName('td');
            var found = false;
            for (var j = 0; j < cellsOfRow.length && !found; j++) {
                var compare = cellsOfRow[j].innerHTML.toLowerCase();
                if (Pbusqueda.length == 0 || (compare.indexOf(Pbusqueda)) > -1) {
                    found = true;
                }
            }
            if (found) {
                tabla.rows[i].style.display = '';
            } else {
                tabla.rows[i].style.display = 'none';

            }
        }

    }
    function Actualizar() {
        window.location = "?c=cobrador&a=genTabla";
        
    }
</script>