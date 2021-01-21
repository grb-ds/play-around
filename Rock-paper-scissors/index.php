<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types = 1);
session_start();

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require 'classes/RockPaperScissors.php';

// Start the game
if (!isset($_SESSION['game'])) {
    $_SESSION["attemptCont"]= 0;
    $game = new RockPaperScissors([]);
    $game->createUser();
    $game->createComputer();
    $game->setGameOptions();
    $_SESSION['game'] = serialize((array) $game);
    echo "if session <br>";
    var_dump($_SESSION['game'] );
} else
    {
        $gameArray = unserialize($_SESSION['game']);

        $gameObject = json_decode(json_encode($gameArray), true);
        $game = new RockPaperScissors($gameArray);
       /* var_dump($gameArray);
        echo " <br> ";
        var_dump($gameObject[0]);*/

        if (isset($_POST["userOption"]))
        {
            $game->setUserOption((int) $_POST["userOption"]);
            echo "<br> game->user <br>";
            var_dump($game->user);
            $_SESSION['game'] = serialize((array) $game);
        }

        if (isset($_POST["run"])) {
            if ($game->validateUserOption()) {
                $game = $game->run();
                $_SESSION['game'] = serialize((array) $game);
                var_dump($_SESSION['game']);
            }
        }
}






/*if (isset($_POST["run"]))
{
    if ($game->validateUserOption())
    {

       // var_dump($game->user);
        $gameArray = unserialize($_SESSION['game']);
        $gameObject = json_decode(json_encode($gameArray), true);
        $game = new RockPaperScissors($gameArray);
       // $game->setGameOptions();
        echo "<br> run<BR>";
        var_dump($game);
    }
}*/

if (isset($_POST["reset"] )) {
    RockPaperScissors::reset();
}




require 'view.php';








