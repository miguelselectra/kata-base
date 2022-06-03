<?php

namespace Kata;

class Mars implements Planet
{
    private const MAP_LIMIT = 10;

    private const OBSTACLES = [
        [1, 1],
    ];

    public function getMapLimit(): int
    {
        return self::MAP_LIMIT;
    }

    public function getObstacles(): array
    {
        return self::OBSTACLES;
    }
}
