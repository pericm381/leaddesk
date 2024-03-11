<?php

use PHPUnit\Framework\TestCase;

class AnagramTest extends TestCase
{
    protected function setUp(): void
    {
        $this->anagram = new CheckingAnagrams();
    }

    public function testAnagrams()
    {
        $this->assertTrue($this->anagram->isAnagram('RAT', 'TAR'));
        $this->assertTrue($this->anagram->isAnagram('LISTEN', 'SILENT'));
        $this->assertTrue($this->anagram->isAnagram('NIGHT', 'THING'));
    }

    public function testNonAnagrams()
    {
        $this->assertFalse($this->anagram->isAnagram('RAT', 'CAR'));
        $this->assertFalse($this->anagram->isAnagram('HELLO', 'WORLD'));
        $this->assertFalse($this->anagram->isAnagram('TEST', 'TESTS'));
    }
}
