<?php
declare(strict_types = 1);
use Calculator\Calculator;
use Calculator\Logger;

require_once __DIR__ . '/../vendor' . '/autoload.php';

class Runner
{
    public static function run()
    {
        $calculator = new Calculator();
        $calculator->setLogger(new class implements Logger
        {

            public function log(String $message)
            {
                file_put_contents('log.txt', $message, FILE_APPEND);
            }
        });
        self::sample($calculator);

    }

    /**
     * @param $calculator
     */
    private static function sample($calculator)
    {
        //Valid data
        try {
            echo $calculator->add(2, 3);
            echo $calculator->sub(9, 12);
            echo $calculator->div(5, 8);
            echo $calculator->mult(4, 7);
            echo $calculator->exp(3);

        } catch (TypeError $e) {
            $calculator->getLogger()->log("Date: " . date("Y-m-d H:i:s") . " " . $e->getMessage() . PHP_EOL);
            echo $e->getMessage() . PHP_EOL;
        }
        //Invalid data - result > PHP_INT_MAX
        try {
            echo $calculator->add(1, PHP_INT_MAX);
        } catch (TypeError $e) {
            $calculator->getLogger()->log("Date: " . date("Y-m-d H:i:s") . " " . $e->getMessage() . PHP_EOL);
            echo $e->getMessage() . PHP_EOL;
        }
        //Invalid data
        try {
            echo $calculator->sub(1, false);
        } catch (TypeError $e) {
            $calculator->getLogger()->log("Date: " . date("Y-m-d H:i:s") . " " . $e->getMessage() . PHP_EOL);
            echo $e->getMessage() . PHP_EOL;
        }
        //Invalid data - result > PHP_INT_MAX
        try {
            echo $calculator->mult(PHP_INT_MAX, 2);
        } catch (TypeError $e) {
            $calculator->getLogger()->log("Date: " . date("Y-m-d H:i:s") . " " . $e->getMessage() . PHP_EOL);
            echo $e->getMessage() . PHP_EOL;
        }
        //Invalid data - division by zero
        try {
            echo $calculator->div(3, 0);
        } catch (TypeError $e) {
            $calculator->getLogger()->log("Date: " . date("Y-m-d H:i:s") . " " . $e->getMessage() . PHP_EOL);
            echo $e->getMessage() . PHP_EOL;
        }
        //Invalid data - result > PHP_INT_MAX
        try {
            echo $calculator->exp(PHP_INT_MAX);
        } catch (TypeError $e) {
            $calculator->getLogger()->log("Date: " . date("Y-m-d H:i:s") . " " . $e->getMessage() . PHP_EOL);
            echo $e->getMessage() . PHP_EOL;
        }
    }
}

Runner::run();