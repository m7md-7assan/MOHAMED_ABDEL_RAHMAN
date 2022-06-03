<?php

use app\database\models\User;
use app\http\requests\Validation;
use app\mails\Verificationcode;

$title="register";

include_once "layouts/header.php";
include_once "layouts/navbar.php";
include_once "layouts/breedcrump.php";
$validation = new Validation;
if($_SERVER['REQUEST_METHOD']=="POST" ){

$validation->setKey('first_name')->setValue($_POST['first_name'])->required()->string()->min(2)->max(32);
$validation->setKey('last_name')->setValue($_POST['last_name'])->required()->string()->min(2)->max(32);
$validation->setKey('phone')->setValue($_POST['phone'])->required()->digits(11)->regex('/^(\+201|01|00201)[0-2,5]{1}[0-9]{8}/')->unique('users','phone');
$validation->setKey('email')->setValue($_POST['email'])->required()->regex('/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/')->unique('users','email');
$validation->setKey('password')->setValue($_POST['password'])->required()->regex('/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/','Minimum eight characters, at least one letter and one number')->confirmed($_POST['password_confirm']);
$validation ->setKey('password_confirm')->setValue($_POST['password_confirm'])->required();
$validation ->setKey('gender')->setValue($_POST['gender'])->required()->in(['male','female']);

if(empty($validation->getErrors())){
    $user= new User;
    $code=rand(100000,999999);
    $user->setFirst_name($_POST['first_name']);
    $user->setLast_name($_POST['last_name']);
    $user->setPhone($_POST['phone']);
    $user->setPassword($_POST['password']);
    $user->setEmail($_POST['email']);
    $user->setGender($_POST['gender']);
    $user->setCode($code);
    
   /*  try {
     $user->insert();
     $body="hello {$_POST['first_name']}.{$_POST['last_name']}";
     $verificationcode=new Verificationcode($_POST['email']," verification code",$body);
         $_SESSION['email']=$_POST['email'];
         header('location:check_code.php');
    }
    catch(\Exception $e) {
     $error="<P>somthing went wrong </p>";
    } */
    try{
        $user->insert();
        // send code
        $body = "<p> Hello {$_POST['first_name']} {$_POST['last_name']}.</p><p> Your Verification Code:<b style='color:blue;'>{$code}</b> </p><p>Thank You.</p>";
        $verificationcode = new Verificationcode($_POST['email'],"Verification Code",$body);
        if($verificationcode->send()){
            $_SESSION['email'] = $_POST['email'];
            header('location:check_code.php?');die;
        }/* else{
            $error = "<p class='alert alert-danger text-center'>something went wrong</p>";
        } */
       
    }catch(\Exception $e){
        $error = "<p class='alert alert-danger text-center'>something went wrong</p>";
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
                               
                                <a class="active" data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                              
                                <div id="lg2" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="" method="post">
                                            <!--     <?= $error ?? ""?> -->
                                                <input type="text" name="first_name" placeholder="First Name" value="<?= $_POST['first_name'] ??'' ?>">
                                                <?= "<p class='text-danger font-weight-bold  '>" . $validation->geterror('first_name') . "</p>" ?>
                                                <input type="text" name="last_name" placeholder="Last Name" value="<?= $_POST['last_name'] ??'' ?>">
                                                <?= "<p class='text-danger font-weight-bold  '>" . $validation->geterror('last_name') . "</p>" ?>
                                                <input type="password" name="password" placeholder="Password" >
                                                <?= "<p class='text-danger font-weight-bold  '>" . $validation->geterror('password') . "</p>" ?>
                                                <input type="password" name="password_confirm" placeholder="Password Confirmation" >
                                                <?= "<p class='text-danger font-weight-bold  '>" . $validation->geterror('password_confirm') . "</p>" ?>
                                                <input name="email" placeholder="Email" type="email" value="<?= $_POST['email'] ??'' ?>">
                                                <?= "<p class='text-danger font-weight-bold  '>" . $validation->geterror('email') . "</p>" ?>
                                                <input name="phone" type="number"  placeholder="Phone" value="<?= $_POST['phone'] ??'' ?>">
                                                <?= "<p class='text-danger font-weight-bold  '>" . $validation->geterror('phone') . "</p>" ?>
                                                <select class="form-control" name="gender" id="gender">
                                                    <?= "<p class='text-danger font-weight-bold  '>" . $validation->geterror('last_name') . "</p>" ?>
                                                    <option value="male">male</option>
                                                    <option value="female">female</option>

                                                </select>
                                                <?= "<p class='text-danger font-weight-bold  '>" . $validation->geterror('gender') . "</p>" ?>
                                                <div class="button-box">
                                                    <button type="submit"><span>Register</span></button>
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
 
          