<?php

namespace Kata;

class Position
{
    public function __construct(
        private int $mapLimit
    )
    {
    }

    const POSSIBLE_MOVES = [
        "N" => [
            "add" => 1,
            "axis" => 1
        ],
        "E" => [
            "add" => 1,
            "axis" => 0
        ],
        "S" => [
            "add" => -1,
            "axis" => 1
        ],
        "W" => [
            "add" => -1,
            "axis" => 0
        ]
    ];

    private array $coordinates = [0, 0];

    const VALID_MOVE = 'M';

    public function isMove(string $action): bool
    {
        return $action === self::VALID_MOVE;
    }

    public function move(string $direction): void
    {
        $axisPosition = self::POSSIBLE_MOVES[$direction]['axis'];
        $this->coordinates[$axisPosition] += self::POSSIBLE_MOVES[$direction]['add'];
        $this->coordinates[$axisPosition] = self::verifyPosition($this->coordinates[$axisPosition]);
    }

    public function getX(): string
    {
        return $this->coordinates[0];
    }

    public function getY(): string
    {
        return $this->coordinates[1];
    }

    private function verifyPosition(int $number): int
    {
        return $number !== -1
            ? $number % $this->mapLimit
            : $this->mapLimit - 1;
    }
}
