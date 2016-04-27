<?php

declare (strict_types = 1);

namespace tests\Regression;

use Phpml\Regression\LeastSquares;

class LeastSquaresTest extends \PHPUnit_Framework_TestCase
{
    public function testPredictSingleFeature()
    {
        $delta = 0.01;

        //https://www.easycalculation.com/analytical/learn-least-square-regression.php
        $features = [60, 61, 62, 63, 65];
        $targets = [3.1, 3.6, 3.8, 4, 4.1];

        $regression = new LeastSquares();
        $regression->train($features, $targets);

        $this->assertEquals(4.06, $regression->predict(64), '', $delta);

        //http://www.stat.wmich.edu/s216/book/node127.html
        $features = [9300,  10565,  15000,  15000,  17764,  57000,  65940,  73676,  77006,  93739, 146088, 153260];
        $targets = [7100, 15500, 4400, 4400, 5900, 4600, 8800, 2000, 2750, 2550,  960, 1025];

        $regression = new LeastSquares();
        $regression->train($features, $targets);

        $this->assertEquals(7659.35, $regression->predict(9300), '', $delta);
        $this->assertEquals(5213.81, $regression->predict(57000), '', $delta);
        $this->assertEquals(4188.13, $regression->predict(77006), '', $delta);
        $this->assertEquals(7659.35, $regression->predict(9300), '', $delta);
        $this->assertEquals(278.66, $regression->predict(153260), '', $delta);
    }
}
