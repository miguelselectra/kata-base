<?php declare(strict_types=1);

namespace KataTests;

use Kata\RoverMars;
use PHPUnit\Framework\TestCase;

class RoverShouldTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider
     */
    public function give_me_a_good_name_please($expected, $value): void
    {
        $roverMars = new RoverMars();

        $result = $roverMars->theMethod($value);

        self::assertEquals($expected, $result);
    }

    public function dataProvider(): array
    {
        return [
            ['0:0:N', ''],
            ['0:0:E', 'R'],
            ['0:0:S', 'RR'],
            ['0:0:N', 'RRRR'],
            ['0:0:W', 'L'],
            ['0:0:S', 'LL'],
            ['0:0:N', 'LLLL'],
            ['0:0:N', 'RL'],
            ['0:0:E', 'RRL'],
            ['0:1:N', 'M'],
            ['1:0:E', 'RM'],
            ['0:9:S', 'RRM'],
            ['9:0:W', 'LM'],
            ['0:0:N', 'MMMMMMMMMM']
        ];
    }
}
