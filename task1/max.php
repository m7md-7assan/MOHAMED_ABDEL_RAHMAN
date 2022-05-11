<?php
//$max=""; $min="";
if ($_POST) {
    $first = $_POST['first_number'];
    $second = $_POST['second_number'];
    $third = $_POST['third_number'];
    if($first>$second&&$first>$third )
    { $max=$_POST['first_number'];
    if($second>$third)
    {$min=$_POST['third_number'];}
    else{$min=$_POST['second_number'];}
    }
    elseif($second>$first&&$second>$third)
    {$max=$_POST['second_number'];
    if($first>$third)
    {$min=$_POST['third_number'];}
    else{$min=$_POST['first_number'];}
    }
    else{$max=$_POST['third_number'];
    if($first>$second)
    {$min=$_POST['second_number'];}
    else{$min=$_POST['first_number'];}
    }
    
}


?>

<!doctype html>
<html lang="en">

<head>
    <title>Max Number</title>
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
                MAX-MIN
            </div>
            <div class="col-4 offset-4 my-5">
                <form method="post">
                    <div class="form-group">
                        <label for="first_number">first number</label>
                        <input type="number" name="first_number" id="first_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="second_number">second number</label>
                        <input type="number" name="second_number" id="second_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="third_number">third number</label>
                        <input type="number" name="third_number" id="third_number" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger rounded btn-sm"> Get Result </button>
                    </div>
                   
            
                        <?php
                        if(isset($max)){
                        echo "max number=" . $max;
                     
                        ?>
                        <br>
                        <?php
                        echo "min number=" . $min;
                        }
                      // echo $max ?? "";
                
                       //echo $min ?? "";
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