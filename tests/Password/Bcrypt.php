<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Cryptography;

use \PHPUnit\Framework\TestCase;

use \Genial\Cryptography\{
    Exception\{
        RangeException,
        LengthException
    },
    Password\Bcrypt;
};

/**
 * HashTest.
 */
final class BcryptTest extends TestCase
{
    
    public function testConstructor()
    {
        $this->expectException(RangeException::class);
        $bcrypt = new Bcrypt(1);
    }
    
}
