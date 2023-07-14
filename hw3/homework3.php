<?php
    /**
     * Homework 3 - Practicing PHP
     *
     * Computing ID: bnh5fh
     * Resources used:
     * https://www.w3schools.com/php/php_arrays_multidimensional.asp
     * https://www.w3schools.com/php/func_array_count.asp
     * https://www.w3schools.com/php/func_array_key_exists.asp#:~:text=The%20array_key_exists()%20function%20checks,the%20key%20does%20not%20exist.
     * https://www3.ntu.edu.sg/home/ehchua/programming/howto/Regexe.html
     * https://www.php.net/manual/en/index.php
     */

    function calculateGrade($scores, $drop) {
      if (empty($scores) === false) {
        $lowest = ["score" => 100, "max_points" => 100];
        $finalgrade = 0;
        $totalscore = 0;
        $totalpoints = 0;
        foreach ($scores as $element) {
          $grade = $element["score"] / $element["max_points"];
          $totalscore += $element["score"];
          $totalpoints += $element["max_points"];
          if ($grade < ($lowest["score"] / $lowest["max_points"])){
            $lowest = $element;
          }
        }
        if ($drop === true){
          $finalgrade = 100*(($totalscore - $lowest["score"]) / ($totalpoints - $lowest["max_points"]));
          return round($finalgrade, 3);
        } else {
          $finalgrade = 100*($totalscore / $totalpoints);
          return round($finalgrade, 3);
        }
      } else {
        return 0;
      }
    }

  function gridCorners($width, $height) {
    $solutions = "";

    // case1: grid of size 0
    if ($height === 0 or $width === 0){
      return "";
    }

    // case2: single vector
    if ($height === 1){
      $count = 1;
      while ($count < $width){
        $solutions .= $count .", ";
        $count++;
      }
      $solutions .= $count;
      return $solutions;
    }
    if ($width === 1){
      $count = 1;
      while ($count < $height){
        $solutions .= $count .", ";
        $count++;
      }
      $solutions .= $count;
      return $solutions;

      // case3: grid
    } else {
      $important = [];
      $bleft = 1;
      array_push($important, $bleft);
      array_push($important, 2);
      array_push($important, $height+1);
      $tleft = $height;
      array_push($important, $tleft);
      array_push($important, $tleft-1);
      array_push($important, $tleft+$height);
      $tright = $height * $width;
      array_push($important, $tright);
      array_push($important, $tright-1);
      array_push($important, $tright - $height);
      $bright = $tright - ($height-1);
      array_push($important, $bright);
      array_push($important, $bright+1);
      array_push($important, $bright-$height);

      $important = array_unique($important);
      sort($important);

      $i = 0;
      while($i+1 < count($important)){
        $solutions .= $important[$i] .", ";
        $i++;
      }
      $solutions .= $important[$i];
      return $solutions;
    }
   }

   function combineShoppingLists(...$lists){
     $solution = [];
     foreach ($lists as $orders){
       if (empty($orders)){
         return [];
       }
       foreach ($orders["list"] as $food){
         if (!array_key_exists($food,$solution)){
           $solution[$food] = [$orders["user"]];
         } else {
           $current = $solution[$food];
           if (!in_array($orders["user"], $current)){
             array_push($current, $orders["user"]);
             $solution[$food] = $current;}
         }
       }
     }
     ksort($solution);
     return $solution;
   }

   function validateEmail($email, $regex = ""){
     $pattern = "/^[A-Za-z0-9_\-\+]+\.*[A-Za-z0-9_\-\+\.]*@[A-Za-z0-9\-]+(\.[A-Za-z0-9\-]+)+$/";
     $result = preg_match($pattern, $email);
     if ($result and !empty($regex)){
       if (preg_match($regex, $email)){
         return true;
       } else {
         return false;
       }
     } else {
       if ($result){
         return true;
       } else {
         return false;
       }
     }
   }

    // No closing php tag needed since there is only PHP in this file
