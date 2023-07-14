<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="your name">
        <meta name="description" content="include some description about your page">
        <title>Wannabe Wordle</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        <div class="container" style="margin-top: 15px;">
          <div id="myModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">How To Play!</h5>
                  <button type="button" data-bs-dismiss="modal">Close</button>
                </div>
                <div class="modal-body">
				              <p>Guess a word! Then, we’ll tell you how many characters of your guess were in the correct position, how many characters were in the target word, and whether your guess was longer, shorter, or the same length as the target word. You may continue guessing until you guess the correct word.</p>
                    </div>
                  </div>
                </div>
              </div>


            <div class="row col-xs-8">
                <div class="text-end">
                  <strong>Welcome <?=$user["name"]?> (<?=$user["email"]?>)</strong>
                </div>
                <div class="text-center">
                  <h1>Wannabe Wordle</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 mx-auto">
                <form action="?command=game" method="post">
                    <div class="p-2 bg-light border rounded-3">
                      <h5>Guesses: <?=$user["count"]?></h4>
                      <input type="hidden" name="questionid" value="<?=$user["word"]?>"/>
                      <div class="h-10 p-5 mb-3 text-center">
                          <input type="text" class="form-control" id="answer" name="answer" placeholder="Type your guess here">
													<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModal">
														How to Play
													</button>
                      </div>
                      <div class="text-center">
                        <?=$message?>
                      <button type="submit" class="btn btn-primary">Submit</button>
                      <a href="?command=gameover" class="btn btn-danger">End Game</a>
                      </div>
                      <div class="" id="pastguesses">
                        <p> Older Guesses: </p>
                        <p><?php
                      for ($i = 0; $i < count($user["guesses"])-1; $i++){
                        echo $user["guesses"][$i];
                        echo "<br>";
                      }
                      ?></p></div>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
