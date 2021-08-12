<?php
/* en esta clase de declaran todas las funciones sql para su proxima interaccion desde el controlador*/
require_once('BaseDeDatos.php');
require_once('cobradores.php');
class consultas{
    private $con;
    
    function __construct()
    {   
        $this->con=BD::conectar();
        

    }
    
       
    public function listarCobradores(){
         $listadoRcoc=[];
        $sql="SELECT * FROM PL_COBRADORES";
        try{
            $centencia=oci_parse($this->con,$sql);
            oci_execute($centencia);
            while(($row=oci_fetch_array($centencia,OCI_ASSOC))!=false){
                $lista = new cobrador();
                $lista->setcve_cob($row['CVE_COB']);
                $lista->setoficina($row['OFICINA']);
                $lista->setnombre($row['NOMBRE']);
                $lista->setactivado($row['ACTIVADO']);
                $lista->setliquidaciones($row['LIQUIDACIONES']);
                array_push($listadoRcoc,$lista);
            }
            return $listadoRcoc;
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
    public function agregar(){
      
      try{
            $CVE_COB=$_POST['CVE_COB'];
            $oficina=$_POST['oficinas'];
            $nombre=$_POST['nombre'];
            $activado=$_POST['Activado'];
            $liquidacion=$_POST['liquidacion'];
           $sql ="INSERT INTO PL_COBRADORES(CVE_COB,OFICINA,NOMBRE,ACTIVADO,LIQUIDACIONES) 
        VALUES ('$CVE_COB','$oficina','$nombre','$activado','$liquidacion')";
     //   var_dump($sql);
            $sql=oci_parse($this->con,$sql);
            oci_execute($sql);
            //si se efectuaron cambios en la tabla se envia la alerta verficando que se afecto el registro
           if(oci_num_rows($sql)>0){
             //si se realizo cambio se imprime y se envia la alerta tipo javascript
            echo '
        
            <script type="text/javascript">
             window.alert("Se agrego un registro nuevo"); </script>
            ';
               return true;
           }else{
            echo '
        
            <script type="text/javascript">
             window.alert("error la CVE_COB ya se encuentra registrada"); </script>
            ';
            
             return false;
           }
        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
    public function seleccionarUNO($uno){
        $listSelectUNO=[];
        $sql="SELECT * FROM PL_COBRADORES WHERE CVE_COB = '$uno'";
        try{
            $sqlCentencia=oci_parse($this->con,$sql);
            oci_execute($sqlCentencia);
            while(($row=oci_fetch_array($sqlCentencia,OCI_ASSOC))!=false){
                $SLUNO = new cobrador();
                $SLUNO->setcve_cob($row['CVE_COB']);
                $SLUNO->setoficina($row['OFICINA']);
                $SLUNO->setnombre($row['NOMBRE']);
                $SLUNO->setactivado($row['ACTIVADO']);
                $SLUNO->setliquidaciones($row['LIQUIDACIONES']);
                array_push($listSelectUNO,$SLUNO);
            }
            return $listSelectUNO;

        }catch(Exception $ex){
            $ex->getMessage();
        }
    }
    public function editar(){
        try{
        $CVE_COB=$_POST['CVE_COB'];
        $oficina=$_POST['oficinas'];
        $nombre=$_POST['nombre'];
        $activado=$_POST['Activado'];
        $liquidacion=$_POST['liquidacion'];

        $sql2 ="UPDATE PL_COBRADORES SET CVE_COB='$CVE_COB',OFICINA='$oficina',NOMBRE='$nombre',
        ACTIVADO='$activado',LIQUIDACIONES='$liquidacion' WHERE CVE_COB='$CVE_COB'";

        $sql2=oci_parse($this->con,$sql2);
        oci_execute($sql2);
            //si se efectuaron cambios en la tabla se envia la alerta verficando que se afecto el registro
            if(oci_num_rows($sql2)>0){
                //si se realizo cambio se imprime y se envia la alerta tipo javascript
                echo '
            
                <script type="text/javascript">
                 window.alert("El registro fue modificado correctamente"); </script>
                ';
                   return true;
               }else{
                
                 return false;
               }
       }catch(Exception $ex){
           $ex->getMessage();
        }
    }
    public function eliminar($CVE_COB){
       
        try{
            $sql="DELETE FROM PL_COBRADORES WHERE CVE_COB='$CVE_COB'";
          //  var_dump($sql);
            $sql=oci_parse($this->con,$sql);
            oci_execute($sql);

          /*  $pdo=$this->con->prepare($sql);
            $pdo->execute(array( $CVE_COB));*/
             //si se efectuaron cambios en la tabla se envia la alerta verficando que se afecto el registro
            if(oci_num_rows($sql)>0){
                //si se realizo cambio se imprime y se envia la alerta tipo javascript
                echo '
                <script type="text/javascript">
                 window.alert("El registro fue eliminado correctamente"); </script>
                 ';
                   return true;
               }else{
                
                 return false;
               }            
        }catch(Exception $e){
            $e->getMessage();
        }
    }
    
}
