<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Casino royale - rock, paper, scissors</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
 <style>
        body {
            background-color:lightgray;
            box-sizing: border-box;
        }
        .form-game {
            display: flex;
        }
        .form-game .form-group {
            margin-top: 50px;
            margin-bottom: 50px;
            margin-right: 8px;
            flex-grow: 1;
            max-width: 300px;
        }
        .form-game .form-control {
            padding: 16px 30px;
            border: 1px solid rgba(245, 245, 245, 0.14);
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.14);
            font-size: 14px;
            height: 48px;
            color: #ffffff;
        }
        .form-game .form-control::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .form-game .form-control::-moz-placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .form-game .form-control:-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .form-game .form-control::-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .form-game .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .form-game .btn-game,
        .form-game .btn-reset{
            padding: 16px 20px;
            font-size: 13px;
            font-weight: bold;
            color: #ffffff;
            border-radius: 4px;
            background-color: #ff5d29;
            border: 0;
            height: 48px;
            white-space: nowrap;
        }
    </style>

</head>
<body>
<div class="container" style="border:1px solid black;">

    <div class = "row">
        <div class = "col-lg-2"> <h1><?php $game->user->getScore() ?>           </h1></div>
        <div class = "col-lg-8" style=" text-align: center;"><h1>ROCK-PAPER-SCISSORS</h1> </div>
        <div class = "col-lg-2"> <h1><?php $game->computer->getScore() ?></h1></div>

    </div>

    <div class = "row">
        <div class = "col-lg-2"> <h1>Player1         </h1></div>
        <div class = "col-lg-8"><h1>      </h1> </div>
        <div class = "col-lg-2"> <h1>Pc</h1></div>

    </div>
    <div class = "row">
        <div class="container my-3 bg-light">
            <form method="post" action="index.php">
                <div class = "row">
                    <div class="col-lg-5 text-left">
                        <?php foreach ($game->gameOptions as $i => $option): ?>
                            <button type="submit" class="btn <?php $game->activateOption($game->user->getIdOption(), $option->getId()); ?>" name="userOption" value="<?php echo $option->getId() ?>">
                                <img src="<?php echo $option->getImage() ?>" width="100"/>
                            </button>
                        <?php endforeach; ?>
                    </div>
                    <div class = "col-lg-2 text-center">
                        <h3> <?php echo $game->message ?> </h3>

                    </div>
                    <div class="col-lg-5 text-right">
                        <?php foreach ($game->gameOptions as $i => $option): ?>
                            <button type="submit" class="btn <?php $game->activateOption($game->computer->getIdOption(), $option->getId()); ?>" name="computerOption" value="<?php echo $option->getId() ?> disabled">
                                <img src="<?php echo $option->getImage() ?>" width="100"/>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary" name="run">Play</button>
                    <button type="submit" class="btn btn-warning" name="reset">Reset</button>
                </div>
            </form>
    </div>

    </div>
</div>

</body>
</html>