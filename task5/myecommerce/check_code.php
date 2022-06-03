<?php

use app\database\models\User;
use app\http\requests\Validation;

$title="Check Code";
include_once "layouts/header.php";
$validation= new Validation;
if ($_SERVER['REQUEST_METHOD']=='POST'){  
    $validation->setKey('code')->setValue($_POST['code'])->required()->digits(6)->exist('users','code');
    
    if(empty($validation->getErrors())){
$user=new User;
$user->setCode($_POST['code']);
$user->setEmail($_SESSION['email']);
if($user->checkusercode()->get_result()->num_rows==1){
   $user->setEmail_verified_at(date('Y-m-d H:i:s'));       
   if($user->DB_verify_mail()){
       if( $_SESSION['code']==1){
        unset($_SESSION['code']); 
        
        
        header('location:reset_password.php');die;
        
       } 
  else{
    unset($_SESSION['email']);
       header('location:login.php');die;
    
    }}
}
else{
    $error='<P> wrong code </p>';
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
                                    <h4> check code </h4>
                                </a>
                               
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="" method="post">
                                                <?= $error ?? "" ?>
                                                <input type="number" name="code" placeholder="Verification code">
                                                <?= $validation->geterror('code')??"" ?>
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