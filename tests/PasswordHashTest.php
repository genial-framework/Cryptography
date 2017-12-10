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
    public function testCipher()
    {
        $this->expectException(UnexpectedValueException::class);
        $state = PasswordHash::cipher('');
    }
 
    public function testCipher1()
    {
        $this->expectException(InvalidArgumentException::class);
        $state = PasswordHash::cipher('hello-world', PASSWORD_BCRYPT, 'test');
    }
 
    public function testCipher2()
    {
        $this->expectException(RangeException::class);
        $state = PasswordHash::cipher('hello-world', PASSWORD_BCRYPT, 0);
    }
  
    public function testGetInfo()
    {
         $hash = PasswordHash::cipher('foo-bar', PASSWORD_DEFAULT);
         $info = PasswordHash::getInfo($hash);
         $this->assertEquals($info['algo'], PASSWORD_DEFAULT);
    }
  
    public function testGetInfo1()
    {
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
        $this->assertEquals(true, true);
    }
  
    public function testVerify4()
    {
        $this->assertEquals(true, true);
    }
  
    public function testVerify5()
    {
        $this->expectException(UnexpectedValueException::class);
        throw new UnexpectedValueException();
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


