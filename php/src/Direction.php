<?php

namespace Kata;

class Direction
{
    const ROTATIONS = [
        'N' => [
            'R' => 'E',
            'L' => 'W'
        ],
        'S' => [
            'R' => 'W',
            'L' => 'E'
        ],
        'E' => [
            'R' => 'S',
            'L' => 'N'
        ],
        'W' => [
            'R' => 'N',
            'L' => 'S'
        ]
    ];

    const VALID_ROTATIONS = ['L', 'R'];

    private string $direction = 'N';

    public function rotate(string $rotateDirection): void
    {
        $this->direction = self::ROTATIONS[$this->direction][$rotateDirection];
    }

    public function isRotation(string $action): bool
    {
        return in_array($action, self::VALID_ROTATIONS);
    }

    public function getDirection(): string
    {
        return $this->direction;
    }
}
