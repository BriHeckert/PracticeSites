<?php
// LINK: https://cs4640.cs.virginia.edu/bnh5fh/hw5/

// Sources used: https://cs4640.cs.virginia.edu trivia example
// https://www.tutorialrepublic.com/codelab.php?topic=faq&file=show-bootstrap-modal-on-page-load
// https://www.php.net/manual/en/function.session-destroy.php

// Register the autoloader
spl_autoload_register(function($classname) {
    include "classes/$classname.php";
});

// Parse the query string for command
$command = "login";
if (isset($_GET["command"]))
    $command = $_GET["command"];

session_start();
// If the user's email is not set in the cookies, then it's not
// a valid session (they didn't get here from the login page),
// so we should send them over to log in first before doing
// anything else!
if (!isset($_SESSION["email"]) && !isset($_SESSION["name"])) {
    // they need to see the login
    $command = "login";
}

// Instantiate the controller and run
$wordle = new WordGameController($command);
$wordle->run();
