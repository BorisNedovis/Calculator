<?php

namespace App\Calculator\Operation;

/**
 * Class Deduct
 *
 * @package App\Calculator\Operation
 */
final class Deduct implements OperationInterface
{
    protected float $old_result;
    protected float $value;

    public function __construct(float $old_result, float $value)
    {
        $this->old_result = $old_result;
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function execute(): float
    {
        return $this->old_result - $this->value;
    }
}