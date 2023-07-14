<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="your name">
        <meta name="description" content="include some description about your page">
        <title>Trivia Game</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        <div class="container" style="margin-top: 15px;">
          <div class="text-end">
            <strong><?=$user["name"]?> (<?=$user["email"]?>)</strong>
          </div>
            <div class="row">
                <div class="col-xs-8 mx-auto text-center">
                    <div class="p-2 bg-light border rounded-3">
                    <h1><?=$message?></h1>
                    <h4>Correct Answer was: <?=$user["word"]?></h4>
                    <p>Total Guesses: <?=$user["count"]?></p>
                    <div class="text-center p-5">
                      <a href="?command=playagain" class="btn btn-primary">Play Again!</a>
                      <a href="?command=logout" class="btn btn-danger">End Game</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
