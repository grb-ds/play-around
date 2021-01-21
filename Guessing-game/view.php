<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Casino royale - guessing game</title>
    <style>
        body {
            background-color:lightgray;
            box-sizing: border-box;
        }
        .form-guessing {
            display: flex;
        }
        .form-guessing .form-group {
            margin-top: 50px;
            margin-bottom: 50px;
            margin-right: 8px;
            flex-grow: 1;
            max-width: 300px;
        }
        .form-guessing .form-control {
            padding: 16px 30px;
            border: 1px solid rgba(245, 245, 245, 0.14);
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0.14);
            font-size: 14px;
            height: 48px;
            color: #ffffff;
        }
        .form-guessing .form-control::-webkit-input-placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .form-guessing .form-control::-moz-placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .form-guessing .form-control:-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .form-guessing .form-control::-ms-input-placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .form-guessing .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        .form-guessing .btn-guessing,
        .form-guessing .btn-reset{
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
<body class="min-vh-100 d-flex flex-column">
<div class="container">
    <header>
        <h1>GUESSING-GAME</h1>
    </header>
    <form method="post" action="index.php" class="form-guessing">
        <div class="form-group">
            <label for="guessNumber" class="sr-only"></label>
            <input type="guessNumber" name="guessNumber" id="guessNumber" class="form-control" placeholder="guessNumber">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-guessing" name="run">Play</button>
        <button type="submit" class="btn btn-reset" name="reset">Reset</button>
        </div>
    </form>
    <div>
        <p>RESULT: <?php echo $message ?> </p>
    </div>
</div>
</body>
</html>