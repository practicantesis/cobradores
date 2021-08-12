<?php
require_once('./Modelo/cobradores.php');
require_once('./Modelo/Consultas.php');
class Ccobrador extends credencial{
//en controlara la vistas y algunas funciones de consulta
        private $mCobradores;
        private $mCobradoresSOLOUNO;
        private $objPDO;
    function __construct(){
        /*declaracion de objetos para su manejo*/
        /*mCobradores=enfocado en todos losregistos
        mCobradoresSOLOUNO=enfocado en un solo registro*/
        $this->mCobradores=new cobrador();
        $this->mCobradoresSOLOUNO=new cobrador();
        $this->objPDO= new consultas();
    }
    public function login(){
        require_once('vista/header.php');
        require_once('vista/login.php');
      //  require_once('/var/www/html/cobradores/vista/tabla/cobradores.php');
        require_once('vista/footer.php');
        
    }
    public function validar(){
         
        $usuario = $_POST['usuario'];
        $contraseña=$_POST['contraseña'];
       // $this->mCobradores=$this->validar($usuario,$contraseña);
        if($usuario==$this->getusuario()&& $contraseña==$this->getcontra()){
           $this-> genTabla();
        }else{
            header('location:index.php');
            
        }

    }
    

    public function genTabla(){
        //se encarga de la vista principal y cargar la tabla con los registros
        if(isset($_GET['CVE_COB'])){
        //aqui recibe la variable get para obtener la informacion de esa clave aparte de
        //mantener la tabla funcionando
        $this->mCobradores=$this->objPDO->listarCobradores();
        $this->mCobradoresSOLOUNO=$this->objPDO->seleccionarUNO($_GET['CVE_COB']);
         require_once('vista/header.php');
         require_once('/var/www/html/cobradores/vista/formularios/formParaEditar.php');
         require_once('/var/www/html/cobradores/vista/tabla/cobradores.php');
         require_once('vista/footer.php');
        }else{
        //la vista entrada sin variable get
           $s=  $this->mCobradores=$this->objPDO->listarCobradores();
         //  print_r($s);
       //    var_dump( $this->mCobradores);
             require_once('vista/header.php');
             require_once('/var/www/html/cobradores/vista/formularios/formParaAgregar.php');
             require_once('/var/www/html/cobradores/vista/tabla/cobradores.php');
             require_once('vista/footer.php');
        }
    }
    public function Actualizar(){
        $this->objPDO->editar();
        $this->genTabla();
    }
    public function agregar(){
        $this->objPDO->agregar();
        $this->genTabla();
    }
    public function eliminar(){
        $this->objPDO->eliminar($_GET['CVE_COB']);
        $this->mCobradores=$this->objPDO->listarCobradores();
        require_once('vista/header.php');
        require_once('/var/www/html/cobradores/vista/formularios/formParaAgregar.php');
        require_once('/var/www/html/cobradores/vista/tabla/cobradores.php');
        require_once('vista/footer.php');
    }

}
class credencial{
         private $us="sistemas";
        private $cont="supersis";
        public function getusuario(){return $this->us;}
        public function getcontra(){return $this->cont;}
}
