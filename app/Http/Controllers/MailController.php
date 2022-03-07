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
    public static function register_email($fullname,$email,$created_at,$role_name){

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

        $mail->Body = view('email.register_email',['fullname'=>$fullname,'email'=>$email,'created_at'=>$created_at,'role'=>$role_name]);
    
        $mail->AltBody = "Su gestor de correo electronico no soporta Emails HTML. Se a enviado una notificacion de registro en Turistear";
            try {
                $mail->Send();
    
            } catch (Exception $e) {
                return "Error ".$e;
            }
        }

        public static function client_notify_aproved_user($name,$email){

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
            $mail->Subject = "Fuiste aprobado en Turistear!"; // Este es el titulo del email.
        
            $mail->Body = view('email.verified_email_user',['name'=> $name]);
        
            $mail->AltBody = "Su gestor de correo electronico no soporta Emails HTML. Se a enviado una notificacion de alta en Turistear";
                try {
                    $mail->Send();
        
                } catch (Exception $e) {
                    return "Error ".$e;
                }
            }

            public static function host_notify_sale($fullname,$email,$phone_number,$created_at,$experiencie_title,$amount_payed){

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
                $mail->Subject = "Te compraron una experiencia en Turistear!"; // Este es el titulo del email.
            
                
                $mail->Body = view('email.new_sale_email',['fullname'=>$fullname,'email'=>$email,'phone_number'=>$phone_number,'created_at'=>$created_at,'experiencie_title'=>$experiencie_title,'amount_payed'=>$amount_payed,]);
            
                $mail->AltBody = "Su gestor de correo electronico no soporta emails HTML. Se a enviado una notificacion de venta de Turistear";
                    try {
                        $mail->Send();
            
                    } catch (Exception $e) {
                        return "Error ".$e;
                    }
                }
        
}


