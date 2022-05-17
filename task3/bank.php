<?php
if (!empty($_POST['user_name']) && !empty($_POST['loan_amount'])) {
    if ($_POST && !empty($_POST['loan_years'])) {
        $name = $_POST['user_name'];
        $loan_value = $_POST['loan_amount'];
        $years = $_POST['loan_years'];
        if ($years > 0 && $years <= 3) {
            $interest = $years * $loan_value * 0.1;
        } elseif ($years > 3) {
            $interest = $years * $loan_value * 0.15;
        }
        $total = $interest + $loan_value;
        $monthly = $total / (12 * $years);
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Bank </title>
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
                BANK
            </div>
            
            <div class="col-4 offset-4 my-5">
                <form method="post">
                    <div class="form-group">
                        <label for="user_name">User Name</label>
                        <input type="text" name="user_name" id="user_name" class="form-control" value="<?php if (isset( $name)) {echo $name; }?>">
                    </div>
                    <div class="form-group">
                        <label for="loan_amount">Loan Amount</label>
                        <input type="number" name="loan_amount" id="loan_amount" class="form-control"value="<?php if (isset( $loan_value)) {echo $loan_value; }?>">
                    </div>
                    <div class="form-group">
                        <label for="loan_years">Loan Years</label>
                        <input type="number" name="loan_years" id="loan_years" class="form-control"value="<?php if (isset( $years)) {echo $years; }?>">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger rounded btn-sm"> Calculate </button>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if (isset($years, $loan_value, $name)) {
            echo "User Name : $name <br>";
            echo "Interest Value : $interest <br>";
            echo "Loan After Interest : $total <br>";
            echo "Monthly Value : $monthly <br>";
        }
        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>