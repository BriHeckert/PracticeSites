<?php
    include("homework3.php");
?><!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">

  <title>Homework 3 Test File</title>
</head>
<body>
<h1>Homework 3 Test File</h1>

<h2>Problem 1</h2>
<?php
    echo "Write tests for Problem 1 here \n";
    $test1 = [ [ "score" => 55, "max_points" => 100 ], [ "score" => 55, "max_points" => 100 ]];
    echo calculateGrade($test1, false); // should be 55
    $test2 = [];
    echo calculateGrade($test2, false); // should be 0
    $test1 = [ [ "score" => 55, "max_points" => 100 ], [ "score" => 7, "max_points" => 10 ]];
    echo calculateGrade($test1, true); // should be 70
    //...
?>

<p>...</p>
<h2>Problem 2</h2>
<?php
echo gridCorners(4, 1);
echo "B\n";
echo gridCorners(0, 1);
echo "B\n";
echo gridCorners(1, 5);
echo "B\n";
echo gridCorners(3, 4);
echo "B\n";
echo gridCorners(2, 2);
echo "B\n";
echo gridCorners(4, 3);
 ?>

 <p>...</p>
 <h2>Problem 3</h2>
 <?php
 $list1 = [ "user" => "Fred",
           "list" => ["frozen pizza", "bread", "apples", "oranges"]
         ];
$list2 = [ "user" => "Wilma",
          "list" => ["bread", "apples", "coffee"]
        ];
$list3 = [ "user" => "Jerry",
          "list" => ["bread"]
        ];
$list4 = array();
 print_r(combineShoppingLists($list1, $list2));
 print_r(combineShoppingLists($list4));
 echo "B\n";
  ?>

<p>...</p>
<h2>Problem 4</h2>
<?php
echo validateEmail("orange@virginia.edu"); // returns true
echo "B\n";
echo validateEmail("no-reply@google.com"); // returns true
echo "B\n";
echo validateEmail("orange.and.+blue@virginia.edu"); // returns true
echo "B\n";
echo validateEmail("google.com"); // returns false
echo "B\n";
echo validateEmail("mst3k@virginia.edu", "/^[a-z][a-z][a-z]?[0-9][a-z][a-z]?[a-z]?@virginia.edu$/"); // returns true
echo "B\n";
echo validateEmail("orange@virginia.edu", "/^[a-z][a-z][a-z]?[0-9][a-z][a-z]?[a-z]?@virginia.edu$/"); // returns false
echo "B\n";
echo validateEmail("orange@blue.com", "/^[a-z\.@]+$/"); // returns true
echo "B\n";
echo validateEmail("orangeblue.com", "/^[a-z\.@]+$/"); // returns false (but matches this regex)
echo "B\n";
echo validateEmail("orange123@blue.com", "/^[a-z\.@]+$/"); // returns false
echo "B\n";
echo validateEmail(""); // returns false
echo "B\n";
echo validateEmail("3as@google.co_m");
echo "B\n";
 ?>
</body>
</html>
