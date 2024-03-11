<?php

use PHPUnit\Framework\TestCase;

class MaxSubarrayTest extends TestCase
{
    private MaxSubarrayImplementation $finder;

    protected function setUp(): void
    {
        $this->finder = new MaxSubarrayImplementation();
    }

    public function testMaxSubarraySum(): void
    {
        $this->assertEquals(6, $this->finder->contiguous([-1, 1, 5, -6, 3]));
        $this->assertEquals(1, $this->finder->contiguous([-1, 1, -5]));
        $this->assertEquals(0, $this->finder->contiguous([0, -1, -2]));
    }

    public function testNonNumericValues(): void
    {
        $this->assertEquals(5, $this->finder->contiguous([-1, '2', 1, 'string', 5]));
        $this->assertEquals(10, $this->finder->contiguous(['string', '10', -2, 2]));
        $this->assertEquals(10, $this->finder->contiguous(['10', -1, '0', 'string']));
    }
}
