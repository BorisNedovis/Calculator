<?php

namespace App\Calculator\Operation;

interface OperationInterface {

    public function __construct(float $old_result, float $value);

    public function execute(): float;

}