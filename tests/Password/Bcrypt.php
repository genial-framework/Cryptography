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
    Exception\RangeException,
    Exception\LengthException,
    Password\Bcrypt
};

/**
 * HashTest.
 */
final class BcryptTest extends TestCase
{
    
    private $xbcrypt;
    
    public function testConstructor()
    {
        $this->expectException(RangeException::class);
        $this->xbcrypt = new Bcrypt(1);
    }
    
    public function testPasswordHash()
    {
        $xbcrypt = new Bcrypt(12);
        $altHash = $xbcrypt->cipher('Hello world!');
        $this->assertTrue(Hash::getOutputSize($altHash) > 20);
        $newHash = $xbcrypt->cipher('Hello life!');
        $this->assertTrue(!Utils::hashEquals($newHash, $altHash));
        $this->assertTrue($newHash !== $altHash);
    }
    
    public function testPasswordHash2()
    {
        $this->expectException(LengthException::class);
        $xbcrypt = new Bcrypt(12);
        $altHash = $xbcrypt->cipher('5WvegR^-e_h5Q7zW#V@US5U$Y2*+UM3@u8?49Z--Dc?W-W#bm^9Kv!yv#rBJAH_eY7a&ma4SZFjW@ZcS');
    }
    
}
