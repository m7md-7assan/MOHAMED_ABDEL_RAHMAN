<?php

use app\database\models\User;
use app\http\requests\Validation;

$title="Reset Pssword";
include_once "layouts/header.php";
include_once "app/middleware/guest.php";

$validation=new Validation;
$user= new User;
if($_SERVER['REQUEST_METHOD']=='POST'){
$validation->setKey('password')->setValue($_POST['password'])->required()->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/','Minimum eight characters, at least one letter and one number')->confirmed($_POST['password_confirm']);
$validation ->setKey('password_confirm')->setValue($_POST['password_confirm'])->required();
if(empty($validation->getErrors())){
    
    $user = new User;
    $user->setEmail($_SESSION['email']);
    $user->setPassword($_POST['password']);
    try{
        $user->updatepassword();
        header('location:login.php');die;
    }catch(\Exception $e){
        $error = "<p class='alert alert-danger'> something went wrong </p>";
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
                                    <h4> Reset Password </h4>
                                </a>
                               
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="" method="post">
                                                <input type="password" name="password" placeholder="password" >
                                                <?= "<p class='text-danger font-weight-bold  '>" . $validation->geterror('password') . "</p>" ?>
                                                <input type="password" name="password_confirm" placeholder="password Confirmation" >
                                                <?= "<p class='text-danger font-weight-bold  '>" . $validation->geterror('password_confirm') . "</p>" ?>
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                    </div>
                                                    <button type="submit"><span>Submit New Password</span></button>
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

include_once "layouts/footer.php";
include_once "layouts/footer_scripts.php";

?>