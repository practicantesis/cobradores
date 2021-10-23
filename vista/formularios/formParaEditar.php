<div id="contenerdorG">
    <div>


        <div class="Modificar">

            <button type="button" class="btn btn-primary" id="Agregar" onclick="AgregarDesdeEditar()"><i class="fa fa-arrow-left"></i>Regresar </button>
            <!-- <button type="button" class="btn btn-secondary" id="Editar" onclick="Editar()">Editar</button>-->
            <?php foreach ($this->mCobradoresSOLOUNO as $reg_sect) : ?>
                <button type="button" class="btn btn-danger" id="Eliminar" onclick="eliminar()">Eliminar <i class="fa fa-trash"></i></button>
                <!--funcion paa confirmar si se quiere elminar a un usuario en lazada al boton elminar-->


                <form name="frmCobradorEditor" action="?c=cobrador&a=Actualizar" id="datos" method="POST">

                    <label>CVE_COB:<input id="CVE_COB_Editor" name="CVE_COB" type="text" value="<?php echo $reg_sect->getcve_cob() ?>" onkeypress="return (event.charCode>=48 && event.charCode<=57)" required></label>
                    <label for="officinas">Oficina</label>
                    <div id="obsiones_officina" class="form-group oficina">

                        <select class="" id="officinas_Editor" name="oficinas">
                            <option><?php echo $reg_sect->getoficina()?>
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
                    <label>Nombre:<input type="text" id="nombre_Editor" class="col-xs-4" name="nombre" value="<?php echo $reg_sect->getnombre() ?>" onkeypress="return (event.charCode>=65 && event.charCode<=90|| event.charCode>=97 && event.charCode<=122|| event.charCode==32)" required></label>
                    <label>Activado:<input type="text" id="Activado_Editor" name="Activado" value="<?php echo $reg_sect->getactivado() ?>" maxlength="1" onkeypress="return (event.charCode==48||event.charCode==49)" required></label>
                    <label>Liquidacion:<input type="text" id="liquidacion_Editor" name="liquidacion" value="<?php echo $reg_sect->getliquidaciones() ?>" maxlength="1" onkeypress="return (event.charCode==48||event.charCode==49)" required></label>
                    <input id="prodId" name="idcve" type="hidden" value="<?php echo $reg_sect->getcve_cob() ?>">
                    <button type="submit" id="btnguardar_Editor" class="btn btn-success" onclick="valicacionDeCamposVacios()" value="Editar">Guardar <i class="fa fa-save"></i></button>
                <?php endforeach; ?>
                <!--****************Este es un documento tipo javascript-->
                <script type="text/javascript">
                    //funcion para confirmar si quiere eliminar el cobrador del registro
                    function eliminar() {
                        var mensaje = "Esta seguro que quiere elminar a cobrador <?php echo $reg_sect->getcve_cob() ?>";
                        if (confirm(mensaje)) {
                            //aqui se enlaza  la funcion eliminar y la detecta como etiqueta GET
                            window.location = "?c=cobrador&a=eliminar&CVE_COB=<?php echo $reg_sect->getcve_cob() ?>";
                        } else {
                            window.location = "?c=cobrador&a=genTabla";
                        }
                    }
                    //Esta es una funcion que regresa a la vista principal
                    function AgregarDesdeEditar() {
                        window.location = "?c=cobrador&a=genTabla";
                    }
                </script>
                </form>