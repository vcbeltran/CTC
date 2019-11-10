
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include ('../includes/include.php'); ?>
        <title>Resultado eliminar</title>
       
    </head>
    <body id="admin">
        <?php
            session_start();
            /* 
             * Si la accion es eliminar un local lo elimina si no está asociado 
             * a un usuario
             * si la acción es eliminar un usuario empresa también lo elimnina
            
             */
            include ('../consultas/consultasLocales.php');
            include ('../consultas/consultasEmpresas.php');
            
            $id = $_REQUEST['codigo'];
            $accion = $_REQUEST['accion'];
            
            //var_dump($accion);
            $consultaLocal = new ConsultasLocales();
            $consultaEmpresa = new consultasEmpresas();
            
            if ($accion == 'eliminaLocal'){
                
                if($consultaLocal->borrarLocal($id)){
                //header("location:editarLocal.php");
                ?>
                    <div class="container  mt-5" >
                     <div class="col-md-4"></div>
                     <div class="col-md-8">
                         <div class="alert alert-danger">
                             <strong>¡Lo sentimos!</strong> El local no se puede eliminar porque está asociado a un usuario empresa.<a href="editarLocal.php" class="alert-link"> Pulse para volver atrás</a>
                         </div>  
                     </div>
             </div>
                
                
                
             <?php }  else { ?>
            <div class="container  mt-5" >
                     <div class="col-md-4"></div>
                     <div class="col-md-8">
                         <div class="alert alert-danger">
                             <strong>¡Lo sentimos!</strong> El local no se puede eliminar porque está asociado a un usuario empresa.<a href="editarLocal.php" class="alert-link"> Pulse para volver atrás</a>
                         </div>  
                     </div>
             </div>
            <?php } 
            } elseif ($accion == 'eliminaEmpresa') {
                if($consultaEmpresa->eliminarUsuarioEmpresa($id)){
                       header("location:editarEmpresa.php");
                } else { ?>
             <div class="container  mt-5" >
                     <div class="col-md-4"></div>
                     <div class="col-md-8">
                         <div class="alert alert-danger">
                             <strong>¡Lo sentimos!</strong> No se ha podido eliminar la empresa.<a href="editarEmpresa.php" class="alert-link"> Pulse para volver atrás</a>
                         </div>  
                     </div>
             </div>
             <?php   }
            }?>
    </body>
</html>
