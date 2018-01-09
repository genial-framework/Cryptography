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
    private $bcrypt;
    
    public function testConstructor()
    {
        $this->expectException(RangeException::class);
        $this->xbcrypt = new Bcrypt(1);
    }
    
    public function __construct()
    {
        $this->bcrypt = new Bcrypt(12);
        $this->assertTrue($this->bcrypt instanceof Bcrypt);
    }
    
    public function testPasswordHash()
    {
        $this->expectException(LengthException::class);
        $hashx = $this->bcrypt->hash('jJ#srmdMsy6qTXAQpnBKe?33xTsjtaSL8^r7@qKYBzAD+*AysU8qH&-=#^7mmSbsNw524BDJva');
    }
    
    public function testPasswordHash2()
    {
        $hash = $this->bcrypt->hash('jJ#srmdMsy6qTXAQpnBKe?33xTs');
        $this->assertEquals($this->bcrypt->verify('jJ#srmdMsy6qTXAQpnBKe?33xTs', $hash), [
            'password_verified' => true,
        ]);
    }
    
}
