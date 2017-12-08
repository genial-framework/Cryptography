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
 * HashHmacTest.
 */
final class HashHmacTest extends TestCase
{
    public function testIsSupportedAlgo()
    {
        $algorithm = 'sha512';
        $this->assertEquals(HashHmac::isSupportedAlgo($algorithm), true);
    }
 
    public function testIsSupportedAlgo1()
    {
        $algorithm = 'foo-bar';
        $this->assertEquals(HashHmac::isSupportedAlgo($algorithm), false);
    }
 
    public function testIsSupportedAlgo2()
    {
        $algorithm = 'sha512';
        $this->assertEquals(HashHmac::isSupportedAlgo($algorithm), true);
    }
    
    public function testGetLastSupportedAlgorithm()
    {
        $this->assertEquals(HashHmac::getLastSupportedAlgorithm(), 'sha512');
    }
    
    public function testClearLastAlgorithmCache()
    {
        HashHmac::clearLastAlgorithmCache();
        $this->assertEquals(HashHmac::getLastSupportedAlgorithm(), null);
    }
    
    public function testCipher()
    {
        $this->expectException(UnexpectedValueException::class);
        HashHmac::cipher('foo-bar', 'foo-bar', 'randomKey');
    }
  
}

