<?php
// REQUIRED HEADERS FOR CORS
// Allow access to our development server, localhost:4200
header("Access-Control-Allow-Origin: https://cs4640.cs.virginia.edu");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT");
$wordleData =
file_get_contents("https://www.cs.virginia.edu/~jh2jf/courses/cs4640/spring2022/wordlist.txt");
    // Return the question
$lines=explode("\n",$wordleData);
$word = strtoupper($lines[random_int(0, count($lines)-1)]);
echo json_encode($word);
