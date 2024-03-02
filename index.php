<?php

require_once __DIR__ . '/vendor/autoload.php';

use AdvCake\StringManipulator;

$string = "Привет! Давно не виделись.";
$result = StringManipulator::revertCharacters($string);
echo $result;