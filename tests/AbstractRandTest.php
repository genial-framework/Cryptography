<?php
/**
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Components>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Cryptography;

use PHPUnit\Framework\TestCase;

/**
 * AbstractRandTest.
 */
final class AbstractRandTest extends TestCase
{
  
    public function testRandomInt()
    {
        $int = Utils::randomInt();
        $this->assertTrue(is_int($int));
        $this->assertTrue(strlen(10, 99) === 2);
        $this->assertTrue(!(strlen(10, 99) === 3));
    }
    
    public function testRandomBytes()
    {
        $bytes = Utils::randomBytes(5);
        $this->assertTrue(is_string($bytes));
        $this->assertTrue(strlen($bytes) === 5);
        $this->assertTrue(!(strlen($bytes) === 6));
    }
  
}
