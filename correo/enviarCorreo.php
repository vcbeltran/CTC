<?php
include 'PHPMailer/PHPMailer.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of enviarCorreo
 *
 * @author 52956653
 */
class enviarCorreo {

    public function enviarConPlantilla($direccionEmail, $texto, $subject) {
        $body = "<html><body><table sytle='border=0'><tr><td style='color:blue;font-size:20px;'><b>CTC le comunica que:</b></td></tr><tr><td><b>" .$texto . "<b></td></tr></table><br>Gracias por su reserva.<br>Si no es necesario no imprima este mail. Piense en el medio ambiente</body></html>";
        $this->enviar($direccionEmail, $body, $subject, null);
    }

    
     public function enviar($direccionEmail, $body, $subject, $fichero) {
        try {
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
                )
            );
            // $mail->SMTPDebug  = 4;
            $mail->Host = "smtp.gmail.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
            $mail->Port = 587; // Puerto de conexión al servidor de envio. 
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "ctc.vero@gmail.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
            $mail->Password = "CTC@2019"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo        
            $mail ->setFrom('ctc.vero@proyectodaw.com', 'Proyecto CTC');
            $mail->AddAddress($direccionEmail); // Esta es la dirección a donde enviamos 
            $mail->IsHTML(true); // El correo se envía como HTML
            $mail->CharSet = 'UTF-8'; // Activo condificación utf-8
            
            $mail->Subject = $subject; // Este es el titulo del email. 

            $mail->Body = $body; // Mensaje a enviar. $exito = $mail->Send(); // Envía el correo.
            if (isset($fichero)){
                $mail ->addAttachment($fichero);
            }
            if($mail -> send()){ 
                echo 'El correo fue enviado correctamente.<br>';
            } else { 
                echo 'Hubo un problema. Contacta con un administrador.';
            } 
  
        } catch (Excepcion $e) {
            echo 'Error en el metodo enviar correo' . $e->getMessage() . "\n";
        }
     }
    
}
