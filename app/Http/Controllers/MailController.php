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

        public static function host_notify_disaproved_user($fullname,$email){

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
            $mail->Subject = "Malas noticias en Turistear :("; // Este es el titulo del email.
        
            $mail->Body = view('email.decline_email',['fullname'=>$fullname,'email'=>$email]);
            $mail->AltBody = "Su gestor de correo electronico no soporta emails HTML. Se a enviado una notificacion de desaprobacion de Turistear";

            try {
                $mail->Send();
            } catch (Exception $e) {
                return "Error ".$e;
            }
        }
        public static function host_notify_aproved_user($fullname,$email){

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

            $mail->Body = view('email.verified_email_anfitrion',['fullname'=> $fullname]);
            $mail->AltBody = "Su gestor de correo electronico no soporta Emails HTML. Se a enviado una notificacion de alta en Turistear!";
            
            try {
                $mail->Send();
            } catch (Exception $e) {
                return "Error ".$e;
            }
        }
        
        public static function admin_notify_sale($fullname_cliente,$email_client,$created_at,$amount,$fullname,$email,$exp_sell){

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
            $mail->AddAddress(env("MAIL_USERNAME")); // Esta es la dirección a donde enviamos
            $mail->IsHTML(true); // El correo se envía como HTML
            $mail->Subject = "Se realizo una compra con exito en Turistear!"; // Este es el titulo del email.

            $mail->Body = view('email.selled_experience_admin',['fullname_cliente'=> $fullname_cliente,'email_client'=> $email_client,'created_at'=> $created_at,'amount'=> $amount,'fullname'=> $fullname,'email'=> $email,'exp_sell'=> $exp_sell]);
            $mail->AltBody = "Su gestor de correo electronico no soporta Emails HTML. Se a enviado una notificacion de venta para administrador en Turistear!";
            
            
            try {
                $mail->Send();
            } catch (Exception $e) {
                return "Error ".$e;
            }
        }

        public static function client_notify_sale($email_client,$nro_sale,$sale_created_at,$experience_title,$total,$ubication){

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
            $mail->AddAddress($email_client); // Esta es la dirección a donde enviamos
            $mail->IsHTML(true); // El correo se envía como HTML
            $mail->Subject = "Se realizo una compra con exito en Turistear!"; // Este es el titulo del email.

            
            $mail->Body = view('email.selled_experience_host',['nro_sale' =>$nro_sale,'sale_created_at' =>$sale_created_at,'experience_title' =>$experience_title,'total' =>$total,'ubication' =>$ubication]);
            $mail->AltBody = "Su gestor de correo electronico no soporta Emails HTML. Se a enviado una notificacion de venta para administrador en Turistear!";
            
            
            try {
                $mail->Send();
            } catch (Exception $e) {
                return "Error ".$e;
            }
        }
        
        public static function host_notify_payment($fullname,$email){

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
            $mail->Subject = "Tu dinero fue depositado por Turistear!"; // Este es el titulo del email.

            $mail->Body = view('email.payment_anfitrion',['fullname' =>$fullname]);
            $mail->AltBody = "Su gestor de correo electronico no soporta Emails HTML. Se a enviado una notificacion de pago para un administrador en Turistear!";
            
            
            try {
                $mail->Send();
            } catch (Exception $e) {
                return "Error ".$e;
            }
        }
        public static function client_reminder_comment($client_email,$client_fullname,$host_fullname,$email,$experience,$place){

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
            $mail->AddAddress($client_email); // Esta es la dirección a donde enviamos
            $mail->IsHTML(true); // El correo se envía como HTML
            $mail->Subject = "Danos un segundo para comentar la experiencia Turistear!"; // Este es el titulo del email.

            $mail->Body = view('email.comment_reminder',['client_fullname'=>$client_fullname,'host_fullname'=>$host_fullname,'email'=>$email,'experience'=>$experience,'place'=>$place]);
            $mail->AltBody = "Su gestor de correo electronico no soporta Emails HTML. Se a enviado un recordatorio de comentario en Turistear!";
            
            
            try {
                $mail->Send();
            } catch (Exception $e) {
                return "Error ".$e;
            }
        }

        public static function client_notify_comment($client_email){

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
            $mail->AddAddress($client_email); // Esta es la dirección a donde enviamos
            $mail->IsHTML(true); // El correo se envía como HTML
            $mail->Subject = "Gracias por tu comentario de parte del equipo de Turistear!"; // Este es el titulo del email.

            $mail->Body = view('email.thanks_for_comment_client');
            $mail->AltBody = "Su gestor de correo electronico no soporta Emails HTML. Se a enviado un agradecimiento de comentario en Turistear!";
            
            try {
                $mail->Send();
            } catch (Exception $e) {
                return "Error ".$e;
            }
        }

        public static function host_notify_commented($host_email,$host_name,$client_fullname,$experience,$comment){

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
            $mail->AddAddress($host_email); // Esta es la dirección a donde enviamos
            $mail->IsHTML(true); // El correo se envía como HTML
            $mail->Subject = "Habemus feedback de tu experiencia en Turistear!"; // Este es el titulo del email.
  
            $mail->Body = view('email.comment_anfitrion',['host_name'=>$host_name,'client_fullname'=>$client_fullname,'experience'=>$experience,'comment'=>$comment]);
            $mail->AltBody = "Su gestor de correo electronico no soporta Emails HTML. Se a enviado una notificacion de comentario en Turistear!";
            
            
            try {
                $mail->Send();
            } catch (Exception $e) {
                return "Error ".$e;
            }
        }


        
}


