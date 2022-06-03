<?php
session_start();
if ( $_POST ) {
    if ($_POST['cleanliness'] == 'bad') {
        $cleanliness = 0;
    } else if ($_POST['cleanliness'] == 'good') {
        $cleanliness = 3;
    } else if ($_POST['cleanliness'] == 'very_good') {
        $cleanliness = 5;
    } else if ($_POST['cleanliness'] == 'excellent') {
        $cleanliness = 10;
    }
    if ($_POST['price'] == 'bad') {
        $price = 0;
    } else if ($_POST['price'] == 'good') {
        $price = 3;
    } else if ($_POST['price'] == 'very_good') {
        $price = 5;
    } else if ($_POST['price'] == 'excellent') {
        $price = 10;
    }
    if ($_POST['nursing'] == 'bad') {
        $nursing = 0;
    } else if ($_POST['nursing'] == 'good') {
        $nursing = 3;
    } else if ($_POST['nursing'] == 'very_good') {
        $nursing = 5;
    } else if ($_POST['nursing'] == 'excellent') {
        $nursing = 10;
    }
    if ($_POST['doctors'] == 'bad') {
        $doctors = 0;
    } else if ($_POST['doctors'] == 'good') {
        $doctors = 3;
    } else if ($_POST['doctors'] == 'very_good') {
        $doctors = 5;
    } else if ($_POST['doctors'] == 'excellent') {
        $doctors = 10;
    }
    if ($_POST['calmness'] == 'bad') {
        $calmness = 0;
    } else if ($_POST['calmness'] == 'good') {
        $calmness = 3;
    } else if ($_POST['calmness'] == 'very_good') {
        $calmness = 5;
    } else if ($_POST['calmness'] == 'excellent') {
        $calmness = 10;
    }
    $total = $cleanliness + $price + $nursing + $doctors + $calmness;
    $_SESSION['total']=$total;
    $_SESSION['cleanliness']=$cleanliness;
    $_SESSION['price']=$price;
    $_SESSION['nursing']=$nursing;
    $_SESSION['doctors']=$doctors;
    $_SESSION['calmness']=$calmness;
    $_SESSION['phone'];
    header('location: result.php');  
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Review</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center h1 mt-5 text-danger">
                Hospital Review
            </div>
            <div class="col-6 offset-4 my-5">
                <form method="post">

                    <div class="p">Are you satisfied with the level of cleanliness?</div>

                    <input type="radio" checked="checked" id="bad" name="cleanliness" value="bad">Bad<br>
                    
                     <input type="radio" id="good" name="cleanliness" value="good">Good<br>
                    
                     <input type="radio" id="very_good" name="cleanliness" value="very_good">Very Good<br>
                
                    <input type="radio" id="excellent" name="cleanliness" value="excellent">Excellent<br>



                    <div class="p">Are you satisfied with the prices of the services?</div>
                    <input type="radio"  checked="checked"id="bad" name="price" value="bad">Bad<br>
                    
                     <input type="radio" id="good" name="price" value="good">Good<br>
                    
                     <input type="radio" id="very_good" name="price" value="very_good">Very Good<br>
                    
                    <input type="radio" id="excellent" name="price" value="excellent">Excellent<br>

                    <div class="p">Are you satisfied with the nursing service</div>

                    <input type="radio" checked="checked" id="bad" name="nursing" value="bad">Bad<br>
                    
                     <input type="radio" id="good" name="nursing" value="good">Good<br>

                     <input type="radio" id="very_good" name="nursing" value="very_good">Very Good<br>
                    
                    <input type="radio" id="excellent" name="nursing" value="excellent">Excellent<br>

                    <div class="p">Are you satisfied with the level of doctors?</div>

                    <input type="radio" checked="checked" id="bad" name="doctors" value="bad">Bad<br>
                     <input type="radio" id="good" name="doctors" value="good">Good<br>
                     <input type="radio" id="very_good" name="doctors" value="very_good">Very Good<br>
                    <input type="radio" id="excellent" name="doctors" value="excellent">Excellent<br>

                    <div class="p">Are you satisfied with the calmness in the hospital?</div>
                    <input type="radio" checked="checked" id="bad" name="calmness" value="bad">Bad<br>
                     <input type="radio" id="good" name="calmness" value="good">Good<br>
                     <input type="radio" id="very_good" name="calmness" value="very_good">Very Good<br>
                    <input type="radio" id="excellent" name="calmness" value="excellent">Excellent<br>
                    <div class="form-group">
                        <button class="btn btn-outline-danger rounded btn-sm"> Submit </button>
                    </div>
                    <?php
                    /*  if (!empty($cleanliness)&&!empty($price)&&!empty($nursing)&&!empty($doctors)&&!empty($calmness)) {
                        echo "total=$total";
                    } */
                    if (isset($cleanliness) && isset($price) && isset($nursing) && isset($doctors) && isset($calmness) && isset($total)) {

                        echo "total=$total";
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>