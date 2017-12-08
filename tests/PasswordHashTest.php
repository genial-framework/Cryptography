<?php
/*
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License
 */
 
namespace Genial\Cryptography;

use Genial\Cryptography\Exception\UnexpectedValueException;
use Genial\Cryptography\Exception\InvalidArgumentException;
use Genial\Cryptography\Exception\RangeException;
use Genial\Cryptography\Password\PasswordHash;
use PHPUnit\Framework\TestCase;

/**
 * PasswordHashTest.
 */
final class PasswordHashTest extends TestCase
{
    
  
    public function testGetInfo()
    {
         $hash = PasswordHash::cipher('foo-bar', PASSWORD_DEFAULT);
         $info = PasswordHash::getInfo($hash);
         $this->assertEquals($info['algo'], PASSWORD_DEFAULT);
    }
  
    public function testGetInfo1()
    {
        if (version_compare(PHP_VERSION, '7.2.0', '>='))
        {
            $hash = PasswordHash::cipher('foo-bar', PASSWORD_ARGON2I);
            $info = PasswordHash::getInfo($hash);
            $this->assertEquals($info['algo'], PASSWORD_ARGON2I);
        }
        $this->assertEquals(true, true);
    }
  
    public function testGetInfo2()
    {
        $hash = PasswordHash::cipher('foo-bar', PASSWORD_BCRYPT);
        $info = PasswordHash::getInfo($hash);
        $this->assertEquals($info['algo'], PASSWORD_BCRYPT);
    }
  
    public function testGetInfo3()
    {
        $this->expectException(UnexpectedValueException::class);
        $info = PasswordHash::getInfo('');
    }
  
    public function testVerify()
    {
        $hash = PasswordHash::cipher('foo-bar', PASSWORD_DEFAULT);
        $this->assertEquals(PasswordHash::verify('foo-bar', $hash), true);
    }
  
    public function testVerify1()
    {
        $hash = PasswordHash::cipher('foo-bar', PASSWORD_DEFAULT);
        $this->assertEquals(PasswordHash::verify('hello-world', $hash), false);
    }
  
    public function testVerify2()
    {
        $this->expectException(UnexpectedValueException::class);
        $hash = PasswordHash::cipher('foo-bar', PASSWORD_DEFAULT);
        $state = PasswordHash::verify('', $hash);
    }
  
    public function testVerify3()
    {
        if (version_compare(PHP_VERSION, '7.2.0', '>='))
        {
            $hash = PasswordHash::cipher('foo-bar', PASSWORD_ARGON2I);
            $this->assertEquals(PasswordHash::verify('foo-bar', $hash), true);
        }
        $this->assertEquals(true, true);
    }
  
    public function testVerify4()
    {
        if (version_compare(PHP_VERSION, '7.2.0', '>='))
        {
            $hash = PasswordHash::cipher('foo-bar', PASSWORD_ARGON2I);
            $this->assertEquals(PasswordHash::verify('hello-world', $hash), false);
        }
        $this->assertEquals(true, true);
    }
  
    public function testVerify5()
    {
        $this->expectException(UnexpectedValueException::class);
        if (version_compare(PHP_VERSION, '7.2.0', '>='))
        {
            $hash = PasswordHash::cipher('foo-bar', PASSWORD_ARGON2I);
            $state = PasswordHash::verify('', $hash);
        }
        throw new InvalidArgumentException();
    }
  
    public function testVerify6()
    {
        $hash = PasswordHash::cipher('foo-bar', PASSWORD_BCRYPT);
        $this->assertEquals(PasswordHash::verify('foo-bar', $hash), true);
    }
  
    public function testVerify7()
    {
        $hash = PasswordHash::cipher('foo-bar', PASSWORD_BCRYPT);
        $this->assertEquals(PasswordHash::verify('hello-world', $hash), false);
    }
  
    public function testVerify8()
    {
        $this->expectException(UnexpectedValueException::class);
        $hash = PasswordHash::cipher('foo-bar', PASSWORD_BCRYPT);
        $state = PasswordHash::verify('', $hash);
    }
  
    public function testVerify9()
    {
        $this->expectException(UnexpectedValueException::class);
        $state = PasswordHash::verify('hello-world', '');
    }
  
}


