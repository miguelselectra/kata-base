<?php

namespace Kata;

interface Planet
{
    public function getMapLimit(): int;
    public function getObstacles(): array;
}
