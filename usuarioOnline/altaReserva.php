<!DOCTYPE html>
<!--
Esta página formaliza una reserva a un usuario. 
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include ('../includes/include.php')?>
        <title>Formalización reserva</title>
    </head>
    <body>
        <?php
        include '../consultas/consultasReservas.php';
        session_start();
        var_dump($_SESSION);
        $idUsuario = $_SESSION['id'];
        $idCodigoFecha = $_GET['idReserva'];
        $fechaRealiza = date("Y-m-d");
        
        echo $idUsuario;
        echo $idCodigoFecha;
        echo $fechaRealiza;
        
        $altaReserva = new consultasReservas();
        if ($altaReserva->insertarReserva($fechaRealiza, $idCodigoFecha, $idUsuario)){
            echo "Enhorabuena, ha realizado una reserva";
        } else {
            echo "Algo ha ido mal";
        }
        
        
        ?>
    </body>
</html>
