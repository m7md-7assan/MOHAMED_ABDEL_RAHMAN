<?php
namespace app\mails;
use app\mails\Mail;

class Verificationcode extends Mail{
public string $mailfromname='ecommerce';
    //Recipients
public function send(){
    try
    {
    $this-> mail->setFrom($this->mailfrom, $this->mailfromname);
    $this->mail->addAddress($this->mailto);     //Add a recipient
    
  
    //Content
    $this->mail->isHTML(true);                                  //Set email format to HTML
    $this->mail->Subject = $this->subject;
    $this->mail->Body    =$this->body; 
    $this->mail->send();
    return true;
   
} 
catch (\Exception $e) {
    echo "Message could not be sent. Mailer Error: {$this-> mail->ErrorInfo}";

    return false;
}
}

}
