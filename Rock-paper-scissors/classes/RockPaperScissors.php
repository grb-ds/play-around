<?php
require_once "GameOption.php";
require_once 'Player.php';

class RockPaperScissors
{
    public $gameOptions = [];
    public $user = null;
    public $computer = null;
    public $winner = null;
    public $message = "";

/*    public function __construct()
    {
        $this->winner = null;
        $this->message = "";
        $this->user = new Player(1, "Player1");
        $this->computer = new Player(2,"Pc");
        $this->setGameOptions();
    }*/

    public function __construct($params = array()) {
        foreach ($params as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function setGameOptions()
    {
        echo "WHEN <BR>";
       $this->gameOptions[] = new GameOption(1, "rock", [3], [2], "https://imgpile.com/images/7DOfZh.png");
       $this->gameOptions[] = new GameOption(2, "paper", [1], [3], "https://imgpile.com/images/7DOmdE.png");
       $this->gameOptions[] = new GameOption(3, "scissors", [2], [1], "https://imgpile.com/images/7DOrrr.png");
    }

    public function createUser()
    {
        $this->user = new Player(array('id' => 1, 'nick' => "Player1"));
    }

    public function createComputer()
    {
        $this->computer = new Player(array('id' => 2, 'nick' => "Pc"));
    }

    public function setUserData($array)
    {
        $this->user = new Player($array);
    }

    public function setComputerData($array)
    {
        $this->computer = new Player($array);
    }

    /**
     * @return int
     * @throws Exception
     */
    public function generateRandomNumber(int $max)
    {
        return random_int(1, $max);
    }

    public function setUserOption($id)
    {
        try {
            $index = $this->getIndexGameOption($id);
            $this->user->setIdOption($id);
            $this->user->setGameOption($this->gameOptions[$index]);
        } catch (Exception $error)
        {
            var_dump($error);
        }
    }

    public function setComputerOption()
    {
        try {
            $id = $this->generateRandomNumber(count($this->gameOptions));
            $index = $this->getIndexGameOption($id);
            $this->computer->setIdOption($id);
            $this->computer->setGameOption($this->gameOptions[$index]);
        } catch (Exception $error)
        {
            var_dump($error);
        }
    }

    /**
     * @param $id
     * @return int
     */
    public function getIndexGameOption($id) : int
    {
        $index = -1; //Not found
        foreach ($this->gameOptions as $key => $item){
            if ($item->getId() === $id) {
                $index = $key;
                break;
            }
        }
        return $index;
    }

    public function getWinner()
    {
        if ($this->user->getIdOption() === $this->computer->getIdOption())
        {
            $this->user->setIsWinner(false);
            $this->computer->setIsWinner(false);
            $this->message = "TIE!";
            return null;
        } else {
            $userOption = $this->user->getGameOption();
            if ($userOption->getIndexIdWithWin($this->computer->getIdOption()) > -1)
            {
                $this->user->setIsWinner(true);
                $this->message = "YOUR WIN!";
                $this->user->setScore($this->user->getScore() + 10 );
                $this->computer->setIsWinner(false);
                $this->winner = $this->user;
                return $this->winner;
            } else if ($userOption->getIndexIdWithLose($this->computer->getIdOption()) > -1) {
                $this->user->setIsWinner(false);
                $this->message = "YOUR LOSE :(";
                $this->computer->setIsWinner(true);
                $this->computer->setScore($this->computer->getScore() + 10 );
                $this->winner = $this->computer;
                return $this->winner;
            }
            return null;
        }
    }

    //TODO THEN WINNER AND LOSE RESET
    public function resetTurn()
    {

    }

    //TODO CALL THIS FUNCTION
    public function waitTurn()
    {
        // Wait 5 seconds
        usleep(5000000);
    }

    public function validateUserOption()
    {
        return $this->user->getIdOption() > -1;
    }

    public function run()
    {
        // This function functions as your game "engine"
        // Now it's on to you to take the steering wheel and determine how it will work
        $this->setComputerOption();
        $this->winner = $this->getWinner();
        return $this;
    }

    public function activateOption($idOption, $idButton)
    {
        if ($idOption === $idButton)
            echo "btn-success";
        else
            echo "";
    }

    public static function reset()
    {
        session_unset();
        session_destroy();
    }
}