<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function send_email($recipient, $sender, $subject, $message)
{
    require_once("phpmailer/class.phpmailer.php");

    $mail = new PHPMailer();
    $body = $message;
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPDebug = false;
    $mail->SMTPSecure = 'tls';
    $mail->Host     = "smtp.gmail.com"; // SMTP servers
    $mail->Port     = 587;
    $mail->Username = "medimix.bth@gmail.com";
    $mail->Password = "team1medimix";
    $mail->AddReplyTo($sender,"MediMix Admin");
    $mail->FromName = "MediMix Admin";
    $mail->From = $sender;
    $mail->Subject = $subject;
    $mail->AltBody = strip_tags($message);
    $mail->MsgHTML($body);
    $mail->AddAddress($recipient);
    if(!$mail->Send())
    {
        return FALSE;
    }
    else
    {
        return TRUE;
    }
}


/* End of file captcha_pi.php */
/* Location: ./system/plugins/captcha_pi.php */