<?php

class GameOption
{
    private $id;
    private $name;
    private $idWithWin;
    private $idWithLose;
    private $image;

    public function __construct(int $id, string $name, array $idWithWin, array $idWithLose, string $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->idWithWin = $idWithWin;
        $this->idWithLose = $idWithLose;
        $this->image = $image;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getIdWithWin(): array
    {
        return $this->idWithWin;
    }

    /**
     * @param array $idWithWin
     */
    public function setIdWithWin(array $idWithWin): void
    {
        $this->idWithWin = $idWithWin;
    }

    /**
     * @return array
     */
    public function getIdWithLose(): array
    {
        return $this->idWithLose;
    }

    /**
     * @param array $idWithLose
     */
    public function setIdWithLose(array $idWithLose): void
    {
        $this->idWithLose = $idWithLose;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @param $id
     * @return int index
     */
    public function getIndexIdWithWin($id) : int
    {
        $index = -1; //Not found
        foreach ($this->idWithWin as $key => $value){
            if ($value === $id) {
                $index = $key;
                break;
            }
        }
        return $index;
    }

    /**
     * @param $id
     * @return int index
     */
    public function getIndexIdWithLose($id) : int
    {
        $index = -1; //Not found
        foreach ($this->idWithLose as $key => $value){
            if ($value === $id) {
                $index = $key;
                break;
            }
        }
        return $index;
    }

}