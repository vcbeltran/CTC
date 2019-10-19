
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Resultado eliminar</title>
       
    </head>
    <body>
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
                header("location:editarLocal.php");
             }  else { ?>
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
