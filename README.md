# cobradores
Este es un sistema MVC(Modelo vista controlador)
con los siguientes archivos
•controlador=se encarga de las funciones principales que vista enviar o movimiento mediante la basde de datos
•Modelo=aqui se registran las tablas de get y set incluyendo las funciones sql confrme a la base de datos
•vista=guarda el codigo html php que se vaya a mandar a llamar y se puede seccionar
        para ser llamado desde elcontrolador
        ejemplo
********desde el controlador*************
        public function eliminar(){
            $this->objPDO->eliminar($_GET['CVE_COB']);=>se invoco desde el archivo modelo 
            $this->mCobradores=$this->objPDO->listarCobradores();=>se invoco desde el archivo modelo
            require_once('vista/header.php');=>cavezera principar del html
            require_once('Vista/formularios/formParaAgregar.php');=>cuerpo del html
            require_once('Vista/tabla/cobradores.php');=>cuerpo del html
   
            require_once('vista/footer.php');=>pie del html
        }****nota como enlistes tus acciones es como se van a cargar de ariba abajo****

--------------------------------------------------------------------------------------------

para poder ingresar a una funcion es de la siguiente manera 
url
    ?c=(cobrador)&a=(funcion)
    ejemplo
    ?c=cobrador&a=agregar
para poder enviar un dato a través del url es de las iguiente manera
url
    ?c=(cobrador)&a=(funcion)&(nombre de la variable GET)=("contenido")
    ejemplo
    href="?c=cobrador&a=genTabla&CVE_COB="
    **nota al realizarlo de esta manera la toma como variable  $_GET