<?php
// dynamic table
// dynamic rows
// dynamic columns
// check if gender of user == m ==> male
// check if gender of user == f ==> female

$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        
         "gender" => (object)[
            'gender' => 'm'
            
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],
        'mail'=>'mohamed@gamil.com'  
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
         "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ], 
    ],
    (object)[
        'id' => null,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ], 
    
    ],  
    (object)[
        'id' => '4',
        'name' => 'shimaa',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ], 
    
    ],  
];
$max_n_property=1;
foreach($users as $n=>$property){
    $properties=count((array)$users[$n]);
    if($properties>$max_n_property)
    {
      //  $max_n_property=$properties;
        $bigest_user=$users[$n];
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Table</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
  <h2> Table</h2>

  <table class="table">
    <thead>
      <tr>
          <?php
          foreach($bigest_user as $p=>$v){?>
        <th><?php echo $p  ?></th>
        <?php }?>
      </tr>
    </thead>
    <tbody>
    <?php $counter=0; ?>
        <?php foreach($users as $prop => $val)
        {?>
        
      <tr>
          
      <?php foreach($users[$counter] as $prop => $val){  ?>
        <td><?php if(is_array($val) ){
    foreach($val as $value){
    echo"$value <br>";      } 
    }
    elseif(is_object($val)){
        foreach($val as $value)
            {
                if($value=='m')
                {echo"male <br>";}
                else echo"female";
            }
            

    }
else{echo$val;} ?></td>
        <?php } ?>
        <?php $counter++ ; ?>
      </tr>
        <?php  } ?>
    </tbody>
  </table>
  <?php 
  

   ?> 
</div>

      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>