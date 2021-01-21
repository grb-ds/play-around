<?php

// Require the correct variable type to be used (no auto-converting)
declare(strict_types = 1);
session_start();

// Show errors so we get helpful information
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Load you classes
require_once 'classes/GuessingGame.php';

if (!isset($_SESSION["generatedNumbers"]) || isset($_POST["reset"] )) {
    GuessingGame::reset();

    $_SESSION["generatedNumbers"] = [];
    $_SESSION["attemptCont"] = 0;
    $_SESSION["message"] = "";
    $message = "";

    $constructorArray = array('maxGuesses' => 5, 'attempts' => 3);
    $game = new GuessingGame($constructorArray);
    $game->generateSecretNumber();
    //Add game object array to Session variable
    $_SESSION['game'] = serialize((array) $game);
} else {
    //Get game object array from session variable
    $gameArray = unserialize($_SESSION['game']);
    /*   To convert object array in object
        $game = json_decode(json_encode($gameArray));
        echo "<br> else  object<BR>";
        var_dump($game);
    */
    //create Game Object with data from session variable
    $game = new GuessingGame($gameArray);
    $game->run();
    $message = $game->message;
}

// Use this function when you need to need an overview of these variables
function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}

whatIsHappening();

require 'view.php';