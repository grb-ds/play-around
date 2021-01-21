<?php

class Player
{
    private $id;
    private $nick;
    private $score = 0;
    private $idOption = -1;
    private $isWinner = false;
    private $gameOption = null;

 /*   public function __construct(int $id, string $nick)
    {
        $this->id = $id;
        $this->nick = $nick;
        $this->score = 0;
        $this->idOption = -1;
        $this->isWinner = false;
        $this->gameOption = null;
    }*/

    public function __construct($params = array()) {
        foreach ($params as $key => $value) {
            $this->{$key} = $value;
        }
    }

    //GETTERS AND SETTERS

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNick(): string
    {
        return $this->nick;
    }

    /**
     * @param string $nick
     */
    public function setNick(string $nick): void
    {
        $this->nick = $nick;
    }

    /**
     * @return int
     */
    public function getScore(): int
    {
        return $this->score;
    }

    /**
     * @param int $score
     */
    public function setScore(int $score): void
    {
        $this->score = $score;
    }

    /**
     * @return int
     */
    public function getIdOption(): int
    {
        return $this->idOption;
    }

    /**
     * @param int $idOption
     */
    public function setIdOption(int $idOption): void
    {
        $this->idOption = $idOption;
    }

    /**
     * @return false
     */
    public function getIsWinner()
    {
        return $this->isWinner;
    }

    /**
     * @param false $isWinner
     */
    public function setIsWinner($isWinner): void
    {
        $this->isWinner = $isWinner;
    }

    /**
     * @return null
     */
    public function getGameOption()
    {
        return $this->gameOption;
    }

    /**
     * @param null $gameOption
     */
    public function setGameOption($gameOption): void
    {
        $this->gameOption = $gameOption;
    }

}