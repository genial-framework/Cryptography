<?php
/*
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License
 */
 
namespace Genial\Cryptography;

use Genial\Cryptography\Exception\UnexpectedValueException;
use PHPUnit\Framework\TestCase;

/**
 * HashTest.
 */
final class HashTest extends TestCase
{
    public function testIsSupportedAlgo()
    {
        $algorithm = 'sha512';
        $this->assertEquals(Hash::isSupportedAlgo($algorithm), true);
    }
    
    public function testIsSupportedAlgo1()
    {
        $algorithm = 'foo-bar';
        $this->assertEquals(Hash::isSupportedAlgo($algorithm), false);
    }
    
    public function testGetLastSupportedAlgorithm()
    {
        $this->assertEquals(Hash::getLastSupportedAlgorithm(), 'sha512');
    }
    
    public function testClearLastAlgorithmCache()
    {
        Hash::clearLastAlgorithmCache();
        $this->assertEquals(Hash::getLastSupportedAlgorithm(), null);
    }
    
    public function testCipher()
    {
        $this->expectException(UnexpectedValueException::class);
        Hash::cipher('foo-bar', 'foo-bar');
    }
    
    public function testCipher1()
    {
        $this->assertEquals(Hash::cipher('sha512', 'foo-bar'), '2f029b0cfec557c0172a1eba3d628c7d6e3ff37d43a3014e942251abb785541e8d83a4bd7e6b415f93c0823343a675283c6443b470e2bdba09e04717c81acfe3');   
    }
 
    public function testGetOutputSize()
    {
        $this->assertEquals(Hash::getOutputSize('sha512', 'foo-bar'), 128);
    }
 
    public function testGetOutputSize1()
    {
        $this->expectException(UnexpectedValueException::class);
        $size = Hash::getOutputSize('foo-bar', 'foo-bar');
    }
  
}

