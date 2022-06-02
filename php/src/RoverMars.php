<?php declare(strict_types=1);

namespace Kata;

final class RoverMars
{
    const INITIAL_DIRECTION = 'N';
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

    public function theMethod(string $coordinates): string
    {
        $position = [0, 0];
        $coordinates = str_split( $coordinates);
        $currentDirection = self::INITIAL_DIRECTION;

        foreach ($coordinates as $action){
            // If changing direction
            if(in_array($action, ['L', 'R'])) {
                $currentDirection = self::ROTATIONS[$currentDirection][$action];
                continue;
            }

            if($action === 'M') {
                $axisPosition = self::POSSIBLE_MOVES[$currentDirection]['axis'];
                $position[$axisPosition] += self::POSSIBLE_MOVES[$currentDirection]['add'];
                $position[$axisPosition] = self::verifyPosition($position[$axisPosition]);
            }
        }

        return $position[0] . ':' . $position[1] . ':' . $currentDirection;
    }

    private function verifyPosition(int $number): int
    {
        return $number !== -1 ? $number % 10 : 9;
    }
}
