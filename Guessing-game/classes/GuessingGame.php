<?php

/**
 * Class GuessingGame
 */
class GuessingGame
{
    public $maxGuesses = 0;
    public $secretNumber = -1;
    public $attempts = 0;
    public $message = "";

    // TODO: set a default amount of max guesses
    public function __construct($params = array()) {
        foreach ($params as $key => $value) {
            $this->{$key} = $value;
        }
    }

    // This function functions as your game "engine"
    // It will run every time, check what needs to happen and run the according functions (or even create other classes)
    public function run()
    {
        // TODO: YES check if a secret number has been generated yet
        // --> if not, generate one and store it in the session (so it can be kept when the user submits the form)
        if (isset($_POST["run"])) {
            if (isset($_POST["guessNumber"])) {
                // TODO: check if the player has submitted a guess
                // --> if so, check if the player won (run the related function) or not (give a hint if the number was higher/lower or run playerLoses if all guesses are used).
               $guessNumber = (int) $_POST["guessNumber"];
               $_SESSION["attemptCont"]++;
               $attemptCont = $_SESSION["attemptCont"];
               if ($attemptCont <= $this->attempts &&  $guessNumber === $this->secretNumber){
                    $this->playerWins();
                }
                else if ($attemptCont <= $this->attempts && $guessNumber > $this->secretNumber ){
                    $this->message = "Your number was higher";
                }
                else if ($attemptCont <= $this->attempts && $guessNumber < $this->secretNumber ){
                    $this->message = "Your number was lower";
                }
                else {
                    $this->playerLoses();
                }
               $_SESSION["message"] = $this->message;
            }
        }
    }

    public function generateSecretNumber() {
        $cont = 0;
        try {
            do {
                $this->secretNumber = random_int(1, $this->maxGuesses);
                $cont++;
            } while (array_key_exists($this->secretNumber, $_SESSION["generatedNumbers"]) && $cont <= 5);
            $_SESSION["generatedNumbers"][count($_SESSION["generatedNumbers"])] = $this->secretNumber;
        } catch (Exception $error){
            var_dump($error);
        }
    }

    public function playerWins()
    {
        // TODO: show a winner message (mention how many tries were needed)
        $this->message = "<p>PLAYER WINS</p>";
    }

    public function playerLoses()
    {
        // TODO: show a lost message (mention the secret number)
        $this->message =  "<p>PLAYER LOSE</p>";
    }

    // TODO as an extra: if a reset button was clicked, use the reset function to set up a new game
    public static function reset()
    {
        // TODO: Generate a new secret number and overwrite the previous one
        session_unset();
        session_destroy();
    }
}