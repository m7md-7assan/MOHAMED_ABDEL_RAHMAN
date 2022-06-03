<?php


$cost;
if (!empty($_POST['number_of_products']) && !empty($_POST['user_name'])) {
    $city = $_POST['city'];
    $number_of_products = $_POST['number_of_products'];

    $name = $_POST['user_name'];
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Super Market </title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="form-group row">
            <div class="col-12 text-center h1 mt-5 text-danger">
                Super Market
            </div>

            <div class="col-4 offset-4 my-5">
                <form method="post">
                    <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input type="text" name="user_name" id="user_name" class="form-control" value="<?php if (isset($name)) {
                                                                                                            echo $name;
                                                                                                        } ?>">


                    </div>
                    <div class="form-group">
                        <label for="user_name">City</label>
                        <select name="city" id="city" class="form-control">
                            <option value="cairo">Cairo</option>
                            <option value="giza">Giza</option>
                            <option value="alexandria">Alexandria</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="number_of_products">Number Of Products</label>
                        <input type="number" name="number_of_products" id="number_of_products" class="form-control" value="<?php if (isset($number_of_products)) {
                                                                                                                                echo $number_of_products;
                                                                                                                            } ?>">



                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger rounded btn-sm"> Enter Products </button>
                    </div>


                    <?php
                    if (isset($number_of_products) && !empty($number_of_products)) {
                        for ($counter = 1; $counter <= $number_of_products; $counter++) {


                            $product = "Product $counter";
                            $price = "Price $counter";
                            $quantities = "Quantity $counter";

                            echo

                            " <div class='form-group row'>
<div class='col-xs-2'>
    <label for='product_name'>$product</label>
    <input class='form-control' name=' product$counter' id='product_name' type='text' >
</div>
<div class='col-xs-2'>
    <label for='price'>$price</label>
    <input class='form-control' name='price$counter' id='price' type='number'>
</div>
<div class='col-xs-2'>
    <label for='quantities'>$quantities</label>
    <input class='form-control' name='quantity$counter' id='quantities' type='number'>
</div>
</div>";
                        }
                        echo '<div class="form-group">
                    <button class="btn btn-outline-danger rounded btn-sm"> Receipt </button>
                </div>';
                    }
                    if (!empty($_POST['quantity1']) && !empty($number_of_products)) {
                        for ($a = 1; $a <= $number_of_products; $a++) {
                            $cost[$a] = $_POST['quantity' . $a] * $_POST['price' . $a];
                        }
                    }
                    if (!empty($city)) {
                        if ($city == 'cairo') {
                            $shipping = 0;
                        } elseif ($city == 'giza') {
                            $shipping = 30;
                        } elseif ($city == 'alexandria') {
                            $shipping = 50;
                        } else {
                            $shipping = 100;
                        }
                    }
                    if (!empty($cost)) {
                        $sum = array_sum($cost);

                        if ($sum >= 4500) {
                            $discount = 0.8;
                        } elseif ($sum >= 3000 && $sum < 4500) {
                            $discount = 0.85;
                        } elseif ($sum >= 1000 && $sum < 3000) {
                            $discount = 0.9;
                        }
                        $total = $sum * $discount;
                        $discount_value = (1 - $discount) * $sum;
                        $net_value = $shipping + $total;
                        echo "<p>Client Name : $name </P>
                <p>Client City : $city </P>
                <p>Total = $sum EGP </P>
                <p>Discount = $discount_value EGP </P>
                <p>Total after Discount : $total EGP</P>
                <p>Delivery : $shipping EGP</P>
                <p>Net Total : $net_value EGP</P>

                
                ";
                    }
                    ?>
                </form>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>