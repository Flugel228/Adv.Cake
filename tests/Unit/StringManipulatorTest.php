<?php

namespace Tests\Unit;

use AdvCake\StringManipulator;
use PHPUnit\Framework\TestCase;

class StringManipulatorTest extends TestCase
{
    public function testRevertCharacters()
    {
        $input = "Hello! Long time no see.";

        $expectedResult = "Olleh! Gnol emit on ees.";

        $result = StringManipulator::revertCharacters($input);

        $this->assertEquals($expectedResult, $result);
    }
}
