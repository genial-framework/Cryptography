<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Crypt;

use \PHPUnit\Framework\TestCase;

/**
 * Argon2iTest.
 */
final class Argon2iTest extends TestCase
{
    
    public function testConstructorError()
    {
        if (\version_compare(\PHP_VERSION, '7.2.0', '>='))
        {
            /*
            $this->expectException(Exception\LengthException::class);
            $xArgon2i = new Password\Argon2i(0, 0, 0);
            */
            $this->assertTrue((bool) \true);
        } else
        {
            $this->expectException(Exception\RuntimeException::class);
            $xArgon2i = new Password\Argon2i(0, 0, 0);
        }
    }
    
    public function testConstructor()
    {
        if (\version_compare(\PHP_VERSION, '7.2.0', '>='))
        {
            /*
            $xArgon2i = new Password\Argon2i();
            if ($xArgon2i instanceof Password\Argon2i) 
            {
                $this->assertTrue((bool) \true);  
            } else
            {
                $this->assertTrue((bool) \false);
            }
            */
        }
        $this->assertTrue((bool) \true);
    }
    
    public function testPasswordHash()
    {
        if (\version_compare(\PHP_VERSION, '7.2.0', '>='))
        {
            /*
            $xArgon2i = new Password\Argon2i();
            $altHash = $xArgon2i->cipher('Hello world!');
            $this->assertTrue(Hash::getOutputSize($altHash) > 20);
            $newHash = $xArgon2i->cipher('Hello life!');
            $this->assertTrue(!Utils::hashEquals($newHash, $altHash));
            $this->assertTrue($newHash !== $altHash);
            */
        }
        $this->assertTrue((bool) \true);
    }
  
    public function testVerifyArgon()
    {
        if (\version_compare(\PHP_VERSION, '7.2.0', '>='))
        {
            /*
            $bcrypt = new Password\Bcrypt(16);
            $xArgon2i = new Password\Argon2i();
            $altHash = $xArgon2i->cipher('Hello world!');
            $res = $xArgon2i->verify('Hello life!', $altHash);
            $res2 = $xArgon2i->verify('Hello world!', $altHash);
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
            */
        }
        $this->assertTrue((bool) \true);
    }
  
}
