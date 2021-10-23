<div id="contenerdorG">
    <div>


        <div class="Modificar">

            <button type="button" class="btn btn-primary" id="Agregar" onclick="Agregar()" >Agregar <i class="fa fa-plus"></i></button>
            <button type="button" class="btn btn-secondary" id="Eliminar" disabled="">Eliminar <i class="fa fa-trash"></i></button>


            <form name="frmAgregar" action="?c=cobrador&a=agregar" id="datos" method="POST">
        
                <label>CVE_COB:<input id="CVE_COB" name="CVE_COB" type="text"  maxlength="6" disabled="true" onkeypress="return (event.charCode>=48&&event.charCode<=57)" required></label>
                <label for="officinas">Oficina:</label>
                <div id="obsiones_officina" class="form-group oficina">

                    <select class="" id="officinas" name="oficinas" disabled="" required>
                        <option value=""> </option>
                        <option>MT1</option>
                        <option>MER</option>
                        <option>CUL</option>
                        <option>MCH</option>
                        <option>NOG</option>
                        <option>CCN</option>
                        <option>CCN</option>
                        <option>MAZ</option>
                        <option>MXL</option>
                        <option>PUE</option>
                        <option>QUE</option>
                        <option>TEP</option>
                        <option>LGT</option>
                        <option>PDM</option>
                        <option>IZT</option>
                        <option>ZAP</option>
                        <option>CHI</option>
                        <option>MNZ</option>
                        <option>STA</option>
                        <option>TOL</option>
                        <option>ALP</option>
                        <option>GPO</option>
                        <option>NLA</option>
                        <option>TOR</option>
                        <option>JUA</option>
                        <option>SLP</option>
                        <option>OMA</option>
                        <option>FCU</option>
                        <option>TPZ</option>
                        <option>GDL</option>
                        <option>HLO</option>
                        <option>KOW</option>
                        <option>TRA</option>
                        <option>SAS</option>
                        <option>MEX</option>
                        <option>VIL</option>
                        <option>TIJ</option>
                        <option>COB</option>
                        <option>MTY</option>

                    </select>
                </div>

               <label>Nombre:<input type="text" id="nombre" class="col-xs-4" name="nombre" required disabled="" onkeypress="return (event.charCode>=65 && event.charCode<=90|| event.charCode>=97 && event.charCode<=122|| event.charCode==32)"></label>

                <label>Activado:<input type="text" id="Activado" name="Activado" required disabled="" maxlength="1" onkeypress="return (event.charCode==48||event.charCode==49)"></label>

                <label>Liquidacion:<input type="text" id="liquidacion" name="liquidacion" required disabled="" maxlength="1" onkeypress="return (event.charCode==48||event.charCode==49)"></label>

                <button type="submit" id="btnguardar" class="btn btn-success" value="agregar" disabled="" >Guardar <i class="fa fa-save"></i></button>


            </form>
            <!--****************Este es un documento tipo javascript-->
            <script type="text/javascript">
                //La funcion principal de agregar es habilitar todos los campos para su funcionamiento.
                function Agregar() {
                    document.getElementById("CVE_COB").disabled = false;
                    document.getElementById("officinas").disabled = false;
                    document.getElementById("nombre").disabled = false;
                    document.getElementById("Activado").disabled = false;
                    document.getElementById("liquidacion").disabled = false;
                    document.getElementById('btnguardar').disabled=false;
                    document.getElementById("Eliminar").disabled = true;
                }
            </script>