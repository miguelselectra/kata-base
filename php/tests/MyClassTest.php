<?php declare(strict_types=1);

namespace KataTests;

use Kata\TheClass;
use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase
{
    /**
     * @test
     * @dataProvider dataProvider
     */
    public function give_me_a_good_name_please($expected, $value): void
    {
        $xxx = new TheClass();

        $result = $xxx->theMethod($value);

        self::assertEquals($expected, $result);
    }

    public function dataProvider(): array
    {
        return [
            'first result' => [true, ''],
            [true, ''],
        ];
    }
}
