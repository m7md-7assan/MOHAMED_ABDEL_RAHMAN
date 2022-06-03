<?php

use app\database\models\User;
use app\http\requests\Validation;
use app\mails\Verificationcode;

$title="Forget Password";
include_once "layouts/header.php";
$validation=new Validation;
$user=new User;
if($_SERVER['REQUEST_METHOD']=='POST')
{
$validation->setKey('email')->setValue($_POST['email'])->required()->regex('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/','wrong email or password')->exist('users','email');
if(empty ($validation->getErrors())){

    $code=rand(100000,999999);
    $user->setCode($code);
    $user->setEmail($_POST['email']);
    
    $body=" hellow ".$_POST['email']." we have recieved a request to reset your password. your verification is $code";
     $verification_code=new Verificationcode($_POST['email'], "forget password code",$body);
     if($user->updatecode())
     {
         if($verification_code->send())
         {
          
             $_SESSION['email']=$_POST['email'];
             $_SESSION['code']=1;
             
             header('location: check_code.php '); die;
         }
       
         
            
     }  
     
}


}

?>
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> <?= $title ?> </h4>
                                </a>
                               
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="" method="post">
                                           
                                                <input type="email" name="email" placeholder="Email" value="<?= $POST['email']??'' ?>">
                                                <p> <?=  $validation->geterror('email')??"" ?></p>
                                                <div class="button-box">
                                                   
                                                    <button type="submit"><span>check</span></button>
                                                </div>
                                               
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        <?php   
include_once "layouts/footer_scripts.php";
?>