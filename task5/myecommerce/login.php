<?php

use app\database\models\User;
use app\http\requests\Validation;

$title="login";
include_once "layouts/header.php";
include_once "app/middleware/guest.php";
include_once "layouts/navbar.php";
include_once "layouts/breedcrump.php";
$validation=new Validation;
$user=new User;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $validation->setKey('email')->setValue($_POST['email'])->required()->regex('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/','wrong email or password')->exist('users','email');
    $validation->setKey('password')->setValue($_POST['password'])->required()->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/','wrong email or password')->exist('users','password');
    if (empty($validation->getErrors())){
        $user->setEmail($_POST['email']);
        $auth_user=$user->getuser()->get_result()->fetch_object();
        if($auth_user->email_verified_at)
        {
            $_SESSION['user']=$auth_user;
            header('location: index.php');
        }
        else
        {
            header('location: check_code.php');
            $_SESSION['email']=$auth_user['email'];
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
                                    <h4> login </h4>
                                </a>
                               
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="" method="post">
                                                <input type="email" name="email" placeholder="Email" value="<?= $_POST['email']??'' ?>">
                                                <p> <?=  $validation->geterror('email')??"" ?></p>
                                                <input type="password" name="password" placeholder="Password">
                                                <p> <?=  $validation->geterror('password')??"" ?></p>
                                                
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Remember me</label>
                                                        <a href="forget_password.php">Forgot Password?</a>
                                                    </div>
                                                    <button type="submit"><span>Login</span></button>
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