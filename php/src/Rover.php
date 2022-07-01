<?php declare(strict_types=1);

namespace Kata;

use Kata\ConnectionEarth\BaseValidator;

final class Rover
{
    private Position $position;
    private Planet $planet;
    private Direction $direction;
    private BaseValidator $baseValidator;

    public function __construct(Planet $planet, BaseValidator $baseValidator)
    {
        $this->baseValidator = $baseValidator;
        $this->position = new Position($planet->getMapLimit());
        $this->direction = new Direction();
        $this->planet = $planet;
    }

    public function execute(string $actionsString): string
    {
        if (! $this->baseValidator->canLand()) {
            return 'Permission denied, go back to the base';
        }

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

            if (in_array([$this->position->getX(), $this->position->getY()], $this->planet->getObstacles())) {
                return 'Crashed:' . $this->position->getX() . ':' . $this->position->getY() . ':' . $this->direction->getDirection();
            }
        }

        return $this->position->getX() . ':' . $this->position->getY() . ':' . $this->direction->getDirection();
    }
}
