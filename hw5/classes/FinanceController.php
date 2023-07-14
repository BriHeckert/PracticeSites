<?php
class FinanceController {

    private $command;
    private $db;


    public function __construct($command) {
        $this->command = $command;
        $this->db = new Database();
    }

    public function run() {
        switch($this->command) {
            case "transaction":
                $this->transaction();
                break;
            case "history":
                $this->history();
                break;
            case "logout":
                $this->destroySessions();
            case "login":
            default:
                $this->login();
                break;
        }
    }

    // Clear all the cookies that we've set
    private function destroySessions() {
      $_SESSION = array();
      session_destroy();
    }


    // Display the login page (and handle login logic)
    // code from cs4640 trivia example
    public function login() {
      if (isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["password"])) {
          $data = $this->db->query("select * from hw5_user where email = ?;", "s", $_POST["email"]);
          if ($data === false) {
              $error_msg = "Error checking for user";
          } else if (!empty($data)) {
              if (password_verify($_POST["password"], $data[0]["password"])) {
                  $_SESSION["name"] = $data[0]["name"];
                  $_SESSION["email"] = $data[0]["email"];
                  $_SESSION["total"] = $data[0]["total"];
                  $_SESSION["password"] = $data[0]["password"];
                  $_SESSION["user_id"] = $data[0]["id"];
                  header("Location: ?command=history");
              } else {
                  $error_msg = "Wrong password";
              }
          } else { // empty, no user found
              // TODO: input validation
              // Note: never store clear-text passwords in the database
              //       PHP provides password_hash() and password_verify()
              //       to provide password verification
              $insert = $this->db->query("insert into hw5_user (name, email, password) values (?, ?, ?);",
                      "sss", $_POST["name"], $_POST["email"],
                      password_hash($_POST["password"], PASSWORD_DEFAULT));
              if ($insert === false) {
                  $error_msg = "Error inserting user";
              } else {
                  $_SESSION["name"] = $_POST["name"];
                  $_SESSION["email"] = $_POST["email"];
                  $_SESSION["total"] = $insert[0]["total"];
                  $_SESSION["password"] = $_POST["password"];
                  $_SESSION["user_id"] = $insert[0]["id"];
                  header("Location: ?command=history");
              }
          }
      }
      include("templates/login.php");
  }

    // Display the question template (and handle question logic)
    public function history() {
        //set user information for the page from the cookie
        $user = [
            "name" => $_SESSION["name"],
            "email" => $_SESSION["email"],
            "id" => $_SESSION["user_id"],
            "password" => $_SESSION["password"]
        ];

        $all = $this->db->query("select * from hw5_transaction where user_id = ? order by t_date desc;", "s", $user["id"]);
        $total = $this->db->query("select sum(amount) as balance from hw5_transaction where user_id = ?;", "d", $user["id"]);
        $category_totals = $this->db->query("select category, sum(amount) as balance from hw5_transaction where user_id = ? group by category;", "d", $user["id"]);

        include("templates/history.php");
    }

    public function transaction(){
      $user = [
          "name" => $_SESSION["name"],
          "email" => $_SESSION["email"],
          "id" => $_SESSION["user_id"],
          "password" => $_SESSION["password"],
      ];

      if (isset($_POST["tname"]) && isset($_POST["category"]) && isset($_POST["amount"]) && isset($_POST["date"])) {
        $pname = $_POST["tname"];
        $pcat = $_POST["category"];
        $pdate = $_POST["date"];
        $pamount = $_POST["amount"];
        $puser = $user["id"];
        if (isset($_POST["credit"])){
          $this->db->query("insert into hw5_transaction (name, category, t_date, amount, user_id) values (?, ?, ?, ?, ?);", "sssds", $pname, $pcat, $pdate, $pamount, $puser);}
        else{
          $pamount = -$pamount;
          $this->db->query("insert into hw5_transaction (name, category, t_date, amount, user_id) values (?, ?, ?, ?, ?);", "sssds", $pname, $pcat, $pdate, $pamount, $puser);
        }
        header("Location: ?command=history");
      }

      include("templates/new.php");
    }
    }
