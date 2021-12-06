<?php declare(strict_types=1);
require_once 'MinLen.php';

use PHPUnit\Framework\TestCase;

final class MinLenTest extends TestCase
{
    public function testMinValidCaseValidator(): void
    {
        $validator = new MinLen(3);
        $this->assertTrue($validator->isValid("asdasddsd"));
    }

    public function testMinInvalidCaseValidator(): void
    {
        $validator = new MinLen(3);
        $this->assertTrue($validator->isValid("q"));
    }
}