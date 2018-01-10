<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Crypt;

use \PHPUnit\Framework\TestCase;

/**
 * BcryptTest.
 */
final class BcryptTest extends TestCase
{
    
    private $xbcrypt;
    
    public function testConstructor()
    {
        $this->expectException(Exception\LengthException::class);
        $this->xbcrypt = new Password\Bcrypt(1);
    }
    
    public function testPasswordHash()
    {
        $xbcrypt = new Password\Bcrypt(12);
        $altHash = $xbcrypt->cipher('Hello world!');
        $this->assertTrue(Hash::getOutputSize($altHash) > 20);
        $newHash = $xbcrypt->cipher('Hello life!');
        $this->assertTrue(!Utils::hashEquals($newHash, $altHash));
        $this->assertTrue($newHash !== $altHash);
    }
    
    public function testPasswordHash2()
    {
        $this->expectException(Exception\LengthException::class);
        $xbcrypt = new Password\Bcrypt(12);
        $altHash = $xbcrypt->cipher('5WvegR^-e_h5Q7zW#V@US5U$Y2*+UM3@u8?49Z--Dc?W-W#bm^9Kv!yv#rBJAH_eY7a&ma4SZFjW@ZcS');
    }
    
    public function testPasswordVerify()
    {
        $this->expectException(Exception\LengthException::class);
        $xbcrypt = new Password\Bcrypt(12);
        $altHash = $xbcrypt->verify('5WvegR^-e_h5Q7zW#V@US5U$Y2*+UM3@u8?49Z--Dc?W-W#bm^9Kv!yv#rBJAH_eY7a&ma4SZFjW@ZcS', '%nodata%');
    }
    
    public function testPasswordVerify2()
    {
        $bcrypt = new Password\Bcrypt(16);
        $xbcrypt = new Password\Bcrypt(12);
        $altHash = $xbcrypt->cipher('Hello world!');
        $res = $xbcrypt->verify('Hello life!', $altHash);
        $res2 = $xbcrypt->verify('Hello world!', $altHash);
        $res3 = $bcrypt->verify('Hello world!', $altHash);
        $this->assertEquals($res, [
            'password_verified' => \false,
        ]);
        $this->assertEquals($res2, [
            'password_verified' => \true,
        ]);
        $this->assertTrue(\count($res) === 1);
        $this->assertTrue(\count($res2) === 1);
        $this->assertTrue(\count($res3) === 2);
    }
    
}
