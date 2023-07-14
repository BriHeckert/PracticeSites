<?php
/**
* Brianna Heckert (bnh5fh)and Kane Aldrich
* https://cs4640.cs.virginia.edu/bnh5fh/hw7/
* https://api.jquery.com/remove/
*/
  $gridon = [];
  $rows = $_GET['rows'];
  $columns = $_GET['columns'];
  $size = $rows * $columns;
  if($size < 5){
    for ($x = 1; $x <= $columns; $x++){
      for ($y = 1; $y <= $rows; $y++){
        $point = [$x, $y];
        array_push($gridon, $point);
      }
    }
  } else {
    $i = 0;
    while($i < 5){
      $randomy = rand(1, $rows);
      $randomx = rand(1, $columns);
      $point = array($randomx, $randomy);
      if (!in_array($point, $gridon)){
        array_push($gridon, $point);
        $i++;
      }
    }
  }
  echo json_encode($gridon);
 ?>
