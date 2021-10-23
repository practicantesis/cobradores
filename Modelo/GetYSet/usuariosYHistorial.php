<?php
class UsuarioEHistorial{
//en este documento se vaciarn todos los campos con get y set de la tabla cobradores

    function __construct(){

    }

    //tablaUsuarios
    private $id_usuario ;
    private $usuario;
    private $contraseña;
    private $Status;
    private $ultima_Conexion;
    public function getid(){ return $this->id_usuario ;}
    public function getusuario(){ return $this->usuario;}
    public function getcontraseña(){ return $this->contraseña;}
    public function getultima_conexion(){ return $this->ultima_Conexion;}
    public function getstatus(){ return $this->Status;}

    public function setid($id_usuario ){ $this->id_usuario =$id_usuario ;}
    public function setusuario($usuario){ $this->usuario=$usuario;}
    public function setcontraseña($contraseña){ $this->contraseña=$contraseña;}
    public function setultima_conexion($ultima_Conexion){ $this->ultima_Conexion=$ultima_Conexion;}
    public function setStatus($Status){$this->Status=$Status;}


    //tabla Historial
    private $id;
    private $id_usuarioH;
    private $fecha;
    private $clave;
    private $oficina;
    private $Nombre;

    public function getidH(){ return $this->id ;}
    public function getusuarioH(){ return $this->id_usuarioH;}
    public function getfecha(){ return $this->fecha;}
    public function getclave(){ return $this->clave;}
    public function getoficina(){ return $this->oficina;}
    public function getnombre(){ return $this->Nombre;}

    public function setidH($id ){ $this->id = $id ;}
    public function setusuarioH($id_usuarioH){ $this->id_usuarioH=$id_usuarioH;}
    public function setclave($clave){ $this->clave=$clave;}
    public function setfecha($fecha){ $this->fecha=$fecha;}
    public function setoficina($oficina){ $this->oficina=$oficina;}
    public function setnombre($Nombre){$this->Nombre=$Nombre;}
    
}