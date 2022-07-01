<?php declare(strict_types=1);

namespace KataTests;

use Kata\ConnectionEarth\BaseValidator;
use Kata\Jupiter;
use Kata\Mars;
use Kata\Rover;
use PHPUnit\Framework\TestCase;

class RoverShouldTest extends TestCase
{
    /**
     * @test
     * @dataProvider marsDataProvider
     */
    public function should_rover_works_in_mars($expected, $value): void
    {
        $baseValidator = $this->createMock(BaseValidator::class);
        $roverMars = new Rover(new Mars(), $baseValidator);

        $baseValidator
            ->method('canLand')
            ->willReturn(true);
        $result = $roverMars->execute($value);

        self::assertEquals($expected, $result);
    }

    public function marsDataProvider(): array
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
            ['0:0:N', 'MMMMMMMMMM'],
            ['Crashed:1:1:E', 'MRM'],
        ];
    }

    /**
     * @test
     * @dataProvider jupiterDataProvider
     */
    public function should_rover_works_in_jupiter($expected, $value): void
    {
        $baseValidator = $this->createMock(BaseValidator::class);
        $roverJupiter = new Rover(new Jupiter(), $baseValidator);

        $baseValidator
            ->method('canLand')
            ->willReturn(true);

        $result = $roverJupiter->execute($value);

        self::assertEquals($expected, $result);
    }

    public function jupiterDataProvider(): array
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
            ['0:19:S', 'RRM'],
            ['19:0:W', 'LM'],
            ['0:0:N', 'MMMMMMMMMMMMMMMMMMMM'],
            ['Crashed:2:1:N', 'RMMLM'],
        ];
    }
}
