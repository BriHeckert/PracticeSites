<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="bnh5fh">
        <meta name="description" content="new transaction">
        <title>Add Transaction</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="?command=history">History</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?command=transaction">New Transaction</a>
          </li>
        </ul>
        <span class="navbar-text ms-auto">
          <strong>Welcome <?=$user["name"]?>! (<?=$user["email"]?>)</strong>
        </span>
        <a href="?command=logout" class="btn btn-danger">Log Out</a>
      </div>
    </nav>
    <body>
        <div class="container" style="margin-top: 15px;">
          <form action="?command=transaction" method="post">
            <h2>Enter a New Transaction</h2>
            <div class="form-group p-2">
               <input type="text" id="tname" name="tname" class="form-control" placeholder="Transaction Name">
             </div>
             <div class="form-group p-2">
                 <input type="text" id="category" name="category" class="form-control" placeholder="Category">
               </div>
               <div class="form-group p-2">
                 <input type="date" id="date" name="date" class="form-control" placeholder="Date">
               </div>
               <div class="form-group p-2">
                 <input type="decimal" id="amount" name="amount" class="form-control" placeholder="Transaction Amount">
               </div>
               <div class="form-group p-2">
                 <div class="form-check">
                    <input class="form-check-input" type="radio" name="credit" id="credit" value="option1">
                    <label class="form-check-label" for="exampleRadios1">
                      Credit(deposit)
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="debit" value="option2">
                    <label class="form-check-label" for="exampleRadios2">
                      Debit(withdrawal)
                    </label>
                  </div>
              </div>
             <div class="text-center">
               <button type="submit" class="btn btn-primary">Submit</button>
             </div>
          </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
