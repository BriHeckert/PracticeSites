<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="bnh5fh">
        <meta name="description" content="transaction history">
        <title>History</title>
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
          <div class="row p-3 text-end">
            <h2>Current Balance: <?=$total[0]["balance"]?></h2>
          </div>
          <div class="row p-3">
            <h4>Sort by Category</h4>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Category</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php
                for ($i = 0; $i < count($category_totals); $i++){ ?>
                  <tr>
                  <td><?=$category_totals[$i]["category"];?></td>
                  <td><?=$category_totals[$i]["balance"];?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>

          </div>
            <div class="row p-3">
              <h4>All Transactions</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Date</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  for ($i = 0; $i < count($all); $i++){ ?>
                    <tr>
                    <td><?=$all[$i]["name"];?></td>
                    <td><?=$all[$i]["category"];?></td>
                    <td><?=$all[$i]["t_date"];?></td>
                    <td><?=$all[$i]["amount"];?></td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
