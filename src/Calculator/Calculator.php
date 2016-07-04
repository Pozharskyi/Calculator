<?php
declare(strict_types = 1);

namespace Calculator;


class Calculator
{
    private $logger;

    public function setLogger(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function getLogger(): Logger
    {
        return $this->logger;
    }

    public function add(int $a, int $b): int
    {
        try {
            $result = $a + $b;
        } catch (\ArithmeticError $e) {
            $this->logger->log("Date: " . date("Y-m-d H:i:s") . " " . $e->getMessage());
            echo $e->getMessage() . PHP_EOL;
        }

        $this->logger->log("Date: " . date("Y-m-d H:i:s") . " " .
            " operator: " . __FUNCTION__ . " " .
            "operands: " . $a . " " . $b . " " .
            " result: " . $result . PHP_EOL);
        return $result;
    }

    public function sub(int $a, int $b) : int
    {

        try {
            $result = $a - $b;
        } catch (\ArithmeticError $e) {
            $this->logger->log("Date: " . date("Y-m-d H:i:s") . " " . $e->getMessage());
            echo $e->getMessage() . PHP_EOL;
        }
        $this->logger->log("Date: " . date("Y-m-d H:i:s") . " " .
            " operator: " . __FUNCTION__ . " " .
            "operands: " . $a . " " . $b . " " .
            " result: " . $result . PHP_EOL);
        return $result;
    }

    public function mult(int $a, int $b) : int
    {

        try {
            $result = $a * $b;
        } catch (\ArithmeticError $e) {
            $this->logger->log("Date: " . date("Y-m-d H:i:s") . " " . $e->getMessage());
            echo $e->getMessage() . PHP_EOL;
        }
        $this->logger->log("Date: " . date("Y-m-d H:i:s") . " " .
            " operator: " . __FUNCTION__ . " " .
            "operands: " . $a . " " . $b . " " .
            " result: " . $result . PHP_EOL);
        return $result;
    }

    public function div(int $a, int $b) : int
    {

        try {
            $result = intdiv($a, $b);
        } catch (\ArithmeticError $e) {
            $this->logger->log("Date: " . date("Y-m-d H:i:s") . " " . $e->getMessage());
            echo $e->getMessage() . PHP_EOL;
        } catch (\DivisionByError $e) {
            $this->logger->log("Date: " . date("Y-m-d H:i:s") . " " . $e->getMessage());
            echo $e->getMessage() . PHP_EOL;
        }
        $this->logger->log("Date: " . date("Y-m-d H:i:s") . " " .
            " operator: " . __FUNCTION__ . " " .
            "operands: " . $a . " " . $b . " " .
            " result: " . $result . PHP_EOL);
        return $result;
    }

    public function exp(int $a) : int
    {

        try {
            $result = 2 ** $a;
        } catch (\ArithmeticError $e) {
            $this->logger->log("Date: " . date("Y-m-d H:i:s") . " " . $e->getMessage());
            echo $e->getMessage() . PHP_EOL;
        }
        $this->logger->log("Date: " . date("Y-m-d H:i:s") . " " .
            " operator: " . __FUNCTION__ . " " .
            "operands: " . $a . " " .
            " result: " . $result . PHP_EOL);
        return $result;
    }
}