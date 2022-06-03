<?php declare(strict_types=1);

namespace Kata;

final class Rover
{
    private Position $position;
    private Planet $planet;
    private Direction $direction;

    public function __construct(Planet $planet)
    {
        $this->position = new Position($planet::MAP_LIMIT);
        $this->direction = new Direction();
        $this->planet = $planet;
    }

    public function execute(string $actionsString): string
    {
        $actions = str_split($actionsString);

        foreach ($actions as $action){
            // If changing direction
            if($this->direction->isRotation($action)) {
                $this->direction->rotate($action);
                continue;
            }

            if($this->position->isMove($action)) {
                $this->position->move($this->direction->getDirection());
            }

            if (in_array([$this->position->getX(), $this->position->getY()], $this->planet::OBSTACLES)) {
                return 'Crashed:' . $this->position->getX() . ':' . $this->position->getY() . ':' . $this->direction->getDirection();
            }
        }

        return $this->position->getX() . ':' . $this->position->getY() . ':' . $this->direction->getDirection();
    }
}
