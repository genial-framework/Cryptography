<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2018 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Cryptography;

use \PHPUnit\Framework\TestCase;

/**
 * AbstractRandTest.
 */
final class AbstractRandTest extends TestCase
{
  
    public function testRandomInt()
    {
        $int = Utils::randomInt(10, 99);
        $this->assertTrue(\is_int($int));
        $this->assertTrue(\strlen($int) === 2);
        $this->assertTrue(!(\strlen($int) === 3));
    }
    
    public function testRandomBytes()
    {
        $bytes = Utils::randomBytes(5);
        $this->assertTrue(\is_string($bytes));
        $this->assertTrue(\strlen($bytes) === 5);
        $this->assertTrue(!(\strlen($bytes) === 6));
    }
  
}
