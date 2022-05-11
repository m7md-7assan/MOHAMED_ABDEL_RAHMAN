<?php
if ($_POST&&$_POST['units_number']!="") {
    $units=$_POST['units_number'];   
  if($units<=50)
  { $unit_price=.5;
      $units_cost=$units*$unit_price;}
  elseif($units>50 && $units<=150)
  {   $unit_price=.75;  
      $units_cost=$units*$unit_price;}
  elseif($units>150 && $units<=250)
  {   $unit_price=1.25;  
      $units_cost=$units*$unit_price;}
  else
  {   $unit_price=1.5;  
      $units_cost=$units*$unit_price;}
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Electricity</title>
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
                Electricity Bill
            </div>
            <div class="col-4 offset-4 my-5">
                <form method="post">
                    <div class="form-group">
                        <label for="units_number">Numer Of Units</label>
                        <input type="number" name="units_number" id="units_number" class="form-control">
                    </div>
                   
                    <div class="form-group">
                        <button class="btn btn-outline-danger rounded btn-sm"> Calculate  </button>
                    </div>
                   
                    <?php
                    if(isset($units_cost))
                    {
                        echo "Unit Price = $unit_price L.E<br>";
                    echo "Electricity Units Cost = $units_cost L.E <br>";
                    $total=1.2*$units_cost;
                    echo "Added Fees = 20% <br>";
                    echo "Total Bill = $total L.E"  ;
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