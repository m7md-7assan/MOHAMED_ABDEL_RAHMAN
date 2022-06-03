<?php

session_start();
$phone=$_SESSION['phone'];
if ($_SESSION['total'] <25) {
    $total = 'Bad';
    $message="Please contact the patient to find out the reason of bad evaluation on this number : $phone";

} else {
    $total = 'Good';
$message='Thank You';
}

if ($_SESSION['cleanliness'] == 0) {
    $cleanliness = 'Bad';
} elseif ($_SESSION['cleanliness'] == 3) {
    $cleanliness = 'Good';
} elseif ($_SESSION['cleanliness'] == 5) {
    $cleanliness = 'Very Good';
} elseif ($_SESSION['cleanliness'] == 10) {
    $cleanliness = 'Excelent';
}
if ($_SESSION['price'] == 0) {
    $price = 'Bad';
} elseif ($_SESSION['price'] == 3) {
    $price = 'Good';
} elseif ($_SESSION['price'] == 5) {
    $price = 'Very Good';
} elseif ($_SESSION['price'] == 10) {
    $price = 'Excelent';
}
if ($_SESSION['nursing'] == 0) {
    $nursing = 'Bad';
} elseif ($_SESSION['nursing'] == 3) {
    $nursing = 'Good';
} elseif ($_SESSION['nursing'] == 5) {
    $nursing = 'Very Good';
} elseif ($_SESSION['nursing'] == 10) {
    $nursing = 'Excelent';
}
if ($_SESSION['doctors'] == 0) {
    $doctors = 'Bad';
} elseif ($_SESSION['doctors'] == 3) {
    $doctors = 'Good';
} elseif ($_SESSION['doctors'] == 5) {
    $doctors = 'Very Good';
} elseif ($_SESSION['doctors'] == 10) {
    $doctors = 'Excelent';
}
if ($_SESSION['calmness'] == 0) {
    $calmness = 'Bad';
} elseif ($_SESSION['calmness'] == 3) {
    $calmness = 'Good';
} elseif ($_SESSION['calmness'] == 5) {
    $calmness = 'Very Good';
} elseif ($_SESSION['calmness'] == 10) {
    $calmness = 'Excelent';
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Result</title>
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
                Hospital Result
            </div>
            <div class="col-12 offset-4 my-5">
                <table>
                    <thead>
                        <th>Question</th>
                        <th>Reviews</th>
                    </thead>
                    <tr>
                        <td>Are you satisfied with the level of cleanliness?</td> <td><?= $cleanliness ?>  </td>
                    </tr>
                    <tr>
                        <td>Are you satisfied with the prices of the services?</td> <td><?= $price ?>  </td>
                    </tr>
                    <tr>
                        <td>Are you satisfied with the nursing service?</td> <td><?= $nursing ?>  </td>
                    </tr>
                    <tr>
                        <td>Are you satisfied with the level of doctors?</td> <td><?= $doctors ?>  </td>
                    </tr>
                    <tr>
                        <td>Are you satisfied with the calmness in the hospital?</td> <td><?= $calmness ?>  </td>
                    </tr>
                    
                </table>
                
                <p> Total Review= <?= $total?></p>
                <p>  <?= $message?></p>




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