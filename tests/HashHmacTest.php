<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */
 
namespace Genial\Cryptography;

use PHPUnit\Framework\TestCase;

/**
 * HashHmacTest.
 */
final class HashHmacTest extends TestCase
{
 
    public function testSupportedAlgo()
    {
        $goodAlgorithm = 'sha512';
        $badAlgorithm = 'foo-774';
        $this->assertTrue(HashHmac::supportedAlgo($goodAlgorithm));
        $this->assertTrue(HashHmac::supportedAlgo($goodAlgorithm));
        $this->assertTrue(!HashHmac::supportedAlgo($badAlgorithm));
    }
 
    public function testClearCachedAlgo()
    {
        HashHmac::clearCachedAlgo();
        $this->assertEquals(HashHmac::getCacheAlgo(), null);
    }
 
    public function testGetCacheAlgo()
    {
        $goodAlgorithm = 'sha512';
        $this->assertTrue(HashHmac::supportedAlgo($goodAlgorithm));
        $this->assertTrue(HashHmac::supportedAlgo($goodAlgorithm));
        $this->assertEquals(HashHmac::getCacheAlgo(), 'sha512');
    }
    
    public function testCipher()
    {
        $this->expectException(Exception\UnexpectedValueException::class);
        HashHmac::clearCachedAlgo();
        $showsError = HashHmac::cipher('foo-774', 'Hello world!', 'randomKey');
    }
 
    public function testCipher2()
    {
        $goodHash1 = Hash::cipher('sha256', 'Hello world!', 'randomKey');
        $goodHash2 = Hash::cipher('sha256', 'Hello life!', 'randomKey');
        $goodHash3 = Hash::cipher('sha256', 'Hello life!', 'randomKey2');
        $this->assertTrue(\mb_strlen($goodHash1, '8bit') === \mb_strlen($goodHash2, '8bit'));
        $this->assertTrue(!(\mb_strlen($goodHash1, '8bit') !== \mb_strlen($goodHash2, '8bit')));
        $this->assertTrue($goodHash1 !== $goodHash3);
        $rawHash1 = HashHmac::cipher('sha256', 'Hello world!', 'randomKey', \true);
        $rawHash2 = HashHmac::cipher('sha256', 'Hello life!', 'randomKey', \true);
        $rawHash3 = HashHmac::cipher('sha256', 'Hello life!', 'randomKey', \true);
        $this->assertEquals(\mb_strlen($rawHash1, '8bit'), \mb_strlen($rawHash2, '8bit'));
        $this->assertEquals($rawHash2, $rawHash3);
        $this->assertTrue($rawHash2 !== $goodHash2);
    }
    
    public function testGetOutputSize()
    {
        HashHmac::clearCachedAlgo();
        $hashSize1 = HashHmac::getOutputSize('35c7e86127569bfc57c4214c507052b0e36a54c845615965d5b825f2d767a8a1');
        $hashSize2 = HashHmac::getOutputSize('55f943049f4893828b758b5e91de27e31e5e924c99b7788009b446010617de3d');
        $this->assertEquals($hashSize1, $hashSize2);
    }
    
}
