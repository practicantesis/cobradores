<?php
require_once('Modelo/GetYSet/cobradores.php');
require_once('Modelo/GetYSet/usuariosYHistorial.php');

require_once('Modelo/Consultas/Consultas.php');
class Ccobrador {
//en controlara la vistas y algunas funciones de consulta
        private $mCobradores;
        private $mCobradoresSOLOUNO;
        private $obj;
        private $UEH;
    function __construct(){
        /*declaracion de objetos para su manejo*/
        /*mCobradores=enfocado en todos losregistos
        mCobradoresSOLOUNO=enfocado en un solo registro*/
        $this->mCobradores=new cobrador();
        $this->mCobradoresSOLOUNO=new cobrador();
        $this->obj= new consultas();
        $this->UEH=new UsuarioEHistorial();
    }
    public function login(){
        require_once('vista/header.php');
        require_once('vista/login.php');
      //  require_once('/var/www/html/cobradores/vista/tabla/cobradores.php');
        require_once('vista/footer.php');
        
    }
    public function validar(){
        //valida el usuario y contraseña
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        // $this->mCobradores=$this->validar($usuario,$contraseña);
        $select = $this->UEH = $this->obj->validar($usuario);
        //  var_dump($select);
        //si existe el usuario
        if ($this->UEH != null) {
            //si el usuarioesta activo (la contraseña viene encriptada)
            if ($select->getultima_conexion() != null || $select->getultima_conexion() == null and $select->getstatus() == 'Activado') {
                //Verificar si la contraseña es corecta
                if (password_verify($contraseña, $select->getcontraseña())) {
                    session_start();
                    $_SESSION['id'] = $select->getid();
                    $_SESSION['usuario'] = $select->getusuario();
                    header("location:?c=cobrador&a=genTabla");
                } else {
                    echo '
                <script type="text/javascript">
                window.alert("La contraseña es incorrecta");
                window.location = "?c=cobrador&a=login"
                </script>';
                }
            } elseif ($select->getstatus() == 'Inactivo') {
                //aqui verifica la contraseña sin encriptar
                if ($select->getcontraseña() === $contraseña) {
                    //aqui se ase el cambio de contraseña y se cambia el status a activo
                    require_once('vista/header.php');
                    require_once('vista/formularios/CambioDeContraseña.php');
                    require_once('vista/footer.php');
                } else {
                    echo '
                <script type="text/javascript">
                window.alert("La contraseña es incorrecta");
                window.location = "?c=cobrador&a=login"
                </script>';
                }
            } else {
                echo '
            <script type="text/javascript">
            window.alert("Este usuario no se encuentra activo favor de contactar a su provedor");
            window.location = "?c=cobrador&a=login"
            </script>';
            }
        } else {
            echo '
            <script type="text/javascript">
            window.alert("la contraseña o el usuario son incorrectos");
            window.location = "?c=cobrador&a=login"
            </script>';
        }

    }
    public function CambioContra(){
        //Realiza el cambio de contaseña 
        $id = $_POST['id'];
        $Con = $_POST['contraFirm'];
        $R = $this->obj->CambioContra($id, $Con);
        if ($R = true) {
            echo '
            <script type="text/javascript">
             window.alert("Se actualizo la contraseña correctamente"); 
             window.location = "?c=cobrador&a=login"</script>
             ';
        }
    }
    public function siExisteSession(){
        session_start();
        $usuario=$_SESSION['usuario'];
        if($usuario==null|| $usuario=''){
            echo'<script type="text/javascript">
            window.alert("Favor de iniciar sesión"); 
            window.location = "?c=cobrador&a=login"</script>
            ';
        }
    }
    public function salir(){
        session_start();
        session_destroy();
        header("location:index.php");
    }
    public function genTablaDeAgregados(){
        session_start();
        $this->UEH=$this->obj->listarCobradoresAgregados();
        require_once('vista/header.php');
        require_once('vista/tabla/historial.php');
        require_once('vista/footer.php');
    }

    public function genTabla(){
        $this->siExisteSession();
        //se encarga de la vista principal y cargar la tabla con los registros
        if(isset($_GET['CVE_COB'])){
        //aqui recibe la variable get para obtener la informacion de esa clave aparte de
        //mantener la tabla funcionando
        $this->mCobradores=$this->obj->listarCobradores();
        $this->mCobradoresSOLOUNO=$this->obj->seleccionarUNO($_GET['CVE_COB']);
         require_once('vista/header.php');
         require_once('vista/menu.php');
         require_once('/var/www/html/cobradores/vista/formularios/formParaEditar.php');
         require_once('/var/www/html/cobradores/vista/tabla/cobradores.php');
         require_once('vista/footer.php');
        }else{
        //la vista entrada sin variable get
           $s=  $this->mCobradores=$this->obj->listarCobradores();
         //  print_r($s);
       //    var_dump( $this->mCobradores);
             require_once('vista/header.php');
             require_once('vista/menu.php');
             require_once('/var/www/html/cobradores/vista/formularios/formParaAgregar.php');
             require_once('/var/www/html/cobradores/vista/tabla/cobradores.php');
             require_once('vista/footer.php');
        }
    }
    public function Actualizar(){
        $this->obj->editar();
        $this->genTabla();
    }
    public function agregar(){
        session_start();
        $idUsuario=$_SESSION['id'];
        $this->obj->agregar($idUsuario);
        $this->genTabla();
    }
    public function eliminar(){
        $this->siExisteSession();
        $this->obj->eliminar($_GET['CVE_COB']);
        $this->mCobradores=$this->obj->listarCobradores();
        require_once('vista/header.php');
        require_once('vista/menu.php');
        require_once('/var/www/html/cobradores/vista/formularios/formParaAgregar.php');
        require_once('/var/www/html/cobradores/vista/tabla/cobradores.php');
        require_once('vista/footer.php');
    }

}
