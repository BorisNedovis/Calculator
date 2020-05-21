<?php

use App\Autoload;
use App\Calculator\Calculator;

include __DIR__ . '/../App/Calculator/Calculator.php';
include __DIR__ . '/../App/Autoload.php';

New Autoload();

$calculator = New Calculator();

$calculator->add(100);

$calculator->deduct(10);

$calculator->multiply(10);

$calculator->divide(10);

print 'Result: ' . $calculator->result();