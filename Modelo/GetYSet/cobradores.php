<?php
class cobrador{
//en este documento se vaciarn todos los campos con get y set de la tabla cobradores
    function __construct(){

    }
    private $CVE_COB;
    private $OFICINA;
    private $NOMBRE;
    private $ACTIVADO;
    private $LIQUIDACIONES;

    public function getcve_cob(){ return $this->CVE_COB;}
    public function getoficina(){ return $this->OFICINA;}
    public function getnombre(){ return $this->NOMBRE;}
    public function getactivado(){ return $this->ACTIVADO;}
    public function getliquidaciones(){ return $this->LIQUIDACIONES;}


    public function setcve_cob($CVE_COB){ $this->CVE_COB=$CVE_COB;}
    public function setoficina($OFICINA){ $this->OFICINA=$OFICINA;}
    public function setnombre($NOMBRE){ $this->NOMBRE=$NOMBRE;}
    public function setactivado($ACTIVADO){ $this->ACTIVADO=$ACTIVADO;}
    public function setliquidaciones($LIQUIDACIONES){ $this->LIQUIDACIONES=$LIQUIDACIONES;}


   


}
?>