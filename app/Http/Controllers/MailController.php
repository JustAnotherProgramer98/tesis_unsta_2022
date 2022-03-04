<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class MailController extends Controller
{
    public static function send_mail($name,$email,$phone,$message){

    $mail = new PHPMailer(true);

    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com"; // SMTP a utilizar.
    $mail->Username = env("MAIL_USERNAME"); // Cuenta de correo que autentifica
    $mail->Password = env("MAIL_PASSWORD"); // Contraseña de la cuenta de correo
    $mail->SMTPSecure = 'tsl'; // Activa el cifrado TLS
    $mail->Port = 587;
    $mail->From = $mail->Username;
    $mail->FromName = $mail->Username;
    $mail->AddAddress($mail->Username); // Esta es la dirección a donde enviamos
    $mail->IsHTML(true); // El correo se envía como HTML
    $mail->Subject = "Aviso de contacto - turistear!"; // Este es el titulo del email.

    $mail->Body = view('email.email',[
        'name'=> $name,
        'email'=>  $email,
        'phone'=>$phone,
        'message'=>   $message,
    ]);

    $mail->AltBody = "Su gestor de correo electronico no soporta Emails HTML. Se a enviado un formulario de contacto de tipo personal";
        try {
            $mail->Send();

        } catch (Exception $e) {
            return "Error ".$e;
        }
    }
    public static function register_email($name,$email){

        $mail = new PHPMailer(true);
    
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com"; // SMTP a utilizar.
        $mail->Username = env("MAIL_USERNAME"); // Cuenta de correo que autentifica
        $mail->Password = env("MAIL_PASSWORD"); // Contraseña de la cuenta de correo
        $mail->SMTPSecure = 'tsl'; // Activa el cifrado TLS
        $mail->Port = 587;
        $mail->From = $mail->Username;
        $mail->FromName = $mail->Username;
        $mail->AddAddress($email); // Esta es la dirección a donde enviamos
        $mail->IsHTML(true); // El correo se envía como HTML
        $mail->Subject = "Registrado correctamente en turistear!"; // Este es el titulo del email.
    
        $mail->Body = view('email.register_email',['name'=> $name]);
    
        $mail->AltBody = "Su gestor de correo electronico no soporta Emails HTML. Se a enviado un formulario de contacto de tipo personal";
            try {
                $mail->Send();
    
            } catch (Exception $e) {
                return "Error ".$e;
            }
        }

        public static function aproved_user($name,$email){

            $mail = new PHPMailer(true);
        
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Host = "smtp.gmail.com"; // SMTP a utilizar.
            $mail->Username = env("MAIL_USERNAME"); // Cuenta de correo que autentifica
            $mail->Password = env("MAIL_PASSWORD"); // Contraseña de la cuenta de correo
            $mail->SMTPSecure = 'tsl'; // Activa el cifrado TLS
            $mail->Port = 587;
            $mail->From = $mail->Username;
            $mail->FromName = $mail->Username;
            $mail->AddAddress($email); // Esta es la dirección a donde enviamos
            $mail->IsHTML(true); // El correo se envía como HTML
            $mail->Subject = "Fuiste aprobado en turistear!"; // Este es el titulo del email.
        
            $mail->Body = view('email.notification_email',['name'=> $name]);
        
            $mail->AltBody = "Su gestor de correo electronico no soporta Emails HTML. Se a enviado un formulario de contacto de tipo personal";
                try {
                    $mail->Send();
        
                } catch (Exception $e) {
                    return "Error ".$e;
                }
            }

        
}


