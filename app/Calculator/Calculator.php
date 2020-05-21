<?php

namespace App\Calculator;

use RuntimeException;

/**
 * Class Calculator
 *
 * @method add($value)
 * @method deduct($value)
 * @method multiply($value)
 * @method divide($value)
 *
 * @package App\Calculator
 */
final class Calculator {

    protected float $result;

    public function __construct()
    {
        $this->result = 0;
    }

    /**
     * @param $class_name
     * @param $arguments
     *
     * @throws RuntimeException
     */
    public function __call(string $class_name, array $arguments): void
    {
        $class_name = ucfirst($class_name);
        $class_path = $this->preparePath($class_name);

        if(file_exists($class_path)) {
            require_once($class_path);

            $class = "\App\Calculator\Operation\\{$class_name}";

            $operation = New $class($this->result, $arguments[0]);

            $this->result = $operation->execute();
        } else {
            throw new RuntimeException("Class '{$class_name}' does not exist");
        }
    }

    /**
     * @param $class_name
     *
     * @return string
     */
    protected function preparePath(string $class_name): string
    {
        $class_path = __DIR__ . "/Operation/$class_name.php";
        $class_path = str_replace('/', DIRECTORY_SEPARATOR, $class_path);

        return $class_path;
    }

    /**
     * Get calculation result.
     *
     * @return float
     */
    public function result(): float
    {
        return $this->result;
    }
}