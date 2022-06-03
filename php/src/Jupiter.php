<?php

namespace Kata;

class Jupiter implements Planet
{
    private const MAP_LIMIT = 20;

    private const OBSTACLES = [
        [2, 1],
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
