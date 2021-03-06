<?php
declare(strict_types=1);


namespace Litipk\TimeModels\Tests\Discrete\Signal;


use Litipk\TimeModels\Discrete\Context\SimpleContext;
use Litipk\TimeModels\Discrete\Signals\FunctionSignal;
use Litipk\TimeModels\Discrete\Signals\MinSignal;

use PHPUnit\Framework\TestCase;


class MinSignalTest extends TestCase
{
    function testMin ()
    {
        $sig1 = new FunctionSignal(function (int $instant) : float {
            return $instant*3;
        });
        $sig2 = new FunctionSignal(function (int $instant) : float {
            return $instant*$instant;
        });

        $signal = new MinSignal($sig1, $sig2);

        $this->assertEquals(-6, $signal->at(new SimpleContext(-2)));
        $this->assertEquals(-3, $signal->at(new SimpleContext(-1)));
        $this->assertEquals(0, $signal->at(new SimpleContext(0)));
        $this->assertEquals(1, $signal->at(new SimpleContext(1)));
        $this->assertEquals(4, $signal->at(new SimpleContext(2)));
        $this->assertEquals(9, $signal->at(new SimpleContext(3)));
        $this->assertEquals(12, $signal->at(new SimpleContext(4)));
        $this->assertEquals(15, $signal->at(new SimpleContext(5)));
    }
}
