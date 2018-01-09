<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */
 
namespace Genial\Cryptography;

use \PHPUnit\Framework\TestCase;

use \Genial\Cryptography\
{
    UnexpectedValueException
};

/**
 * HashTest.
 */
final class HashTest extends TestCase
{
 
    public function testSupportedAlgo()
    {
        $goodAlgorithm = 'sha512';
        $badAlgorithm = 'foo-774';
        $this->assertTrue(Hash::supportedAlgo($goodAlgorithm));
        $this->assertTrue(Hash::supportedAlgo($goodAlgorithm));
        $this->assertTrue(!Hash::supportedAlgo($badAlgorithm));
    }
 
    public function testClearCachedAlgo()
    {
        Hash::clearCachedAlgo();
        $this->assertEquals(Hash::getCacheAlgo(), null);
    }
 
    public function testGetCacheAlgo()
    {
        $goodAlgorithm = 'sha512';
        $this->assertTrue(Hash::supportedAlgo($goodAlgorithm));
        $this->assertTrue(Hash::supportedAlgo($goodAlgorithm));
        $this->assertEquals(Hash::getCacheAlgo(), 'sha512');
    }
    
    public function testCipher()
    {
        $this->expectException(UnexpectedValueException::class);
        Hash::clearCachedAlgo();
        $showsError = Hash::cipher('foo-774', 'Hello world!');
    }
 
    public function testCipher2()
    {
        $goodHash1 = Hash::cipher('sha256', 'Hello world!');
        $goodHash2 = Hash::cipher('sha256', 'Hello life!');
        $this->assertEquals($goodHash1, 'c0535e4be2b79ffd93291305436bf889314e4a3faec05ecffcbb7df31ad9e51a');
        $this->assertEquals($goodHash2, '1f14a51182aaddc4b3c2a24909e93c1b1174d8dcdf8eec7c7bfe6486aab20977');
        $this->assertTrue(\mb_strlen($goodHash1, '8bit') === \mb_strlen($goodHash2, '8bit'));
        $this->assertTrue(!(\mb_strlen($goodHash1, '8bit') !== \mb_strlen($goodHash2, '8bit')));
        $rawHash1 = Hash::cipher('sha256', 'Hello world!', \true);
        $rawHash2 = Hash::cipher('sha256', 'Hello life!', \true);
        $rawHash3 = Hash::cipher('sha256', 'Hello life!', \true);
        $this->assertEquals(\mb_strlen($rawHash1, '8bit'), \mb_strlen($rawHash2, '8bit'));
        $this->assertEquals($rawHash2, $rawHash3);
        $this->assertTrue($rawHash2 !== $goodHash2);
    }
    
    public function testGetOutputSize()
    {
        Hash::clearCachedAlgo();
        $hashSize1 = Hash::getOutputSize('c0535e4be2b79ffd93291305436bf889314e4a3faec05ecffcbb7df31ad9e51a');
        $hashSize2 = Hash::getOutputSize('1f14a51182aaddc4b3c2a24909e93c1b1174d8dcdf8eec7c7bfe6486aab20977');
        $this->assertEquals($hashSize1, $hashSize2);
    }
    
}

