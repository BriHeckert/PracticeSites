<?php
class WordGameController {

    private $command;

    public function __construct($command) {
        $this->command = $command;
    }

    public function run() {
        switch($this->command) {
            case "game":
                $this->game();
                break;
            case "gameover":
                $this->gameover();
                break;
            case "logout":
                $this->destroyCookies();
            case "playagain":
                $this->restartgame();
            case "login":
            default:
                $this->login();
                break;
        }
    }

    public function restartgame(){
      $_SESSION["word"] = $this->loadWord();
      $_SESSION["guesses"] = [];
      $_SESSION["count"] = 0;

      header("Location: ?command=game");
    }

    // Clear all the cookies that we've set
    private function destroyCookies() {
      $_SESSION = array();
      session_destroy();
    }


    // Display the login page (and handle login logic)
    public function login() {
        if (isset($_POST["email"]) && !empty($_POST["email"]) && isset($_POST["name"]) && !empty($_POST["name"])) { /// validate the email coming in and make sure they enter a name
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["name"] = $_POST["name"];
            $_SESSION["guesses"] = []; // array of associative arrays that contain the information for each guess
            $_SESSION["count"] = 0;
            $_SESSION["word"] = $this->loadWord();
            header("Location: ?command=game");
            return;
        }

        include "templates/login.php";
    }

    // Load a question from the API
    private function loadWord() {
        $wordleData =
            file_get_contents("https://www.cs.virginia.edu/~jh2jf/courses/cs4640/spring2022/wordlist.txt");
        // Return the question
        $lines=explode("\n",$wordleData);
        $word = strtoupper($lines[random_int(0, count($lines)-1)]);
        return $word;
    }

    // Display the question template (and handle question logic)
    public function game() {
        //set user information for the page from the cookie
        $user = [
            "name" => $_SESSION["name"],
            "email" => $_SESSION["email"],
            "guesses" => $_SESSION["guesses"],
            "count" => $_SESSION["count"],
            "word" => $_SESSION["word"]
        ];

        // if the user submitted an answer, check it
        $message = "";
        if (isset($_POST["answer"])) {
            $answer = strtoupper($_POST["answer"]);

            if ($_SESSION["word"] == $answer) {
                // user answered correctly -- perhaps we should also be better about how we
                // verify their answers, perhaps use strtolower() to compare lower case only.
                $message = "<div class='alert alert-success text-center'><b>$answer</b> was correct!</div>";
                $user["count"] += 1;
                $_SESSION["count"] += 1;
                array_push($_SESSION["guesses"],$answer);
                array_push($user["guesses"],$answer);
                header("Location: ?command=gameover");

                // Update the cookie: won't be available until next page load (stored on client)
                //setcookie("score", $_COOKIE["score"] + 10, time() + 3600);
            } else {
                $user["count"] += 1;
                $_SESSION["count"] += 1;

                // compare lengths
                if (strlen($answer) === strlen($_SESSION["word"])){
                  $length = "$answer is the same length as the wordle.";
                } elseif (strlen($answer) < strlen($_SESSION["word"])){
                  $length = "$answer is too short!";
                } else {
                  $length = "$answer is too long!";
                }

                // compare locations and characters
                $locationcount = 0;
                $charcount = 0;
                for ($i = 0; $i < strlen($answer) and $i < strlen($_SESSION["word"]); $i++){
                  if ($answer[$i] === $_SESSION["word"][$i]){
                    $locationcount += 1;
                  }
                  if (strpos($_SESSION["word"], $answer[$i]) !== false){
                    $charcount += 1;
                  }
                }

                $message = "<div class='alert alert-danger'>Nope! But... \n $length $answer has $charcount correct letters and $locationcount letters in the right spot.</div>";

                $newguess = "$length $answer has $charcount correct letters and $locationcount letters in the right spot.";

                array_push($_SESSION["guesses"],$newguess);
                array_push($user["guesses"],$newguess);

            }
        }

        include("templates/game.php");
    }

    public function gameover(){
      $user = [
          "name" => $_SESSION["name"],
          "email" => $_SESSION["email"],
          "guesses" => $_SESSION["guesses"],
          "count" => $_SESSION["count"],
          "word" => $_SESSION["word"]
      ];

      if (in_array($_SESSION["word"], $_SESSION["guesses"])){
        $message = "CONGRATS! You Guessed it!";
      } else {
        $message = "GAME OVER!";
      }
      include("templates/gameover.php");
    }
}
