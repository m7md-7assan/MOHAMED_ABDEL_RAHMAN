<?php
namespace app\mails;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class Mail{
protected string $mailto;
protected string $body;
protected string $subject;
protected PHPMailer $mail;
protected string $mailfrom='ntimay2022@gmail.com'; 
private string $password= 'nti01004411210'; 
private string $host='smtp.gmail.com'; 
public function __construct(string $mailto, string $subject , string $body)
{
    $this->mailto=$mailto;
    $this->subject=$subject;
    $this->body=$body;
    $this->mail = new PHPMailer(true);
    $this->mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $this->mail->isSMTP();                                            //Send using SMTP
    $this->mail->Host       = $this->host;                     //Set the SMTP server to send through
    $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $this->mail->Username   = $this->mailfrom;                     //SMTP username
    $this->mail->Password   = $this->password;                               //SMTP password
    $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $this->mail->Port       = 465;                             
   
}
}
?>