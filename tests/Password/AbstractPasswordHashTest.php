<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */
 
namespace Genial\Crypt;

use \PHPUnit\Framework\TestCase;

/**
 * AbstractPasswordHashTest.
 */
final class AbstractPasswordHashTest extends TestCase
{
    
    public function testPasswordHash()
    {
        $xbcrypt = new Password\Bcrypt(12);
        $altHash = $xbcrypt->cipher('Hello world!');
        $this->assertTrue(\is_array($xbcrypt->getHashInfo($altHash)));
    }
    
}
