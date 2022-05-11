<?php
if ($_POST&&$_POST['chemestry']!="") {
if ($_POST['english']!=""&&$_POST['biology']!="") {
if ($_POST['math']!=""&&$_POST['physics']!="") {
$result=$_POST['physics']+$_POST['math']+$_POST['english']+$_POST['chemestry']+$_POST['biology'];   
$percentage=$result*100/500;
if($percentage>=90)
{$grade='A';}
elseif($percentage>=80 && $percentage <90)
{$grade='B';}
elseif($percentage>=70 && $percentage <80)
{$grade='C';}
elseif($percentage>=60 && $percentage <70)
{$grade='D';}
elseif($percentage>=40 && $percentage <60)
{$grade='E';}
    else
    {$grade='F';}
}}}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Grade</title>
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
            Grade
            </div>
            <div class="col-4 offset-4 my-5">
                <form method="post">
                    <div class="form-group">
                        <label for="first_number">Chemestry</label>
                        <input type="number" max="100" name="chemestry" id="chemestry" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="math">Math</label>
                        <input type="number" max="100" name="math" id="math" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="english">English</label>
                        <input type="number"max="100" name="english" id="english" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="biology">Biology</label>
                        <input type="number" max="100" name="biology" id="biology" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="physics">Physics</label>
                        <input type="number" max="100" name="physics" id="physics" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger rounded btn-sm"> Get Result </button>
                    </div>
                    <?php
                    if(isset($result))
                    {echo "Result =   $result  <br>" ;
                    echo "Percentage = $percentage % <br> ";
                    echo "Grade = $grade  <br> ";
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