<?php
/**
 * @link      <https://github.com/Genial-Components/Cryptography> for the canonical source repository.
 * @copyright Copyright (c) 2017-2019 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Components/Cryptography/blob/master/LICENSE> New BSD License.
 */

namespace Genial\Crypt;

use \PHPUnit\Framework\TestCase;

/**
 * UtilsTest.
 */
final class UtilsTest extends TestCase
{
    
    public function testHashEquals()
    {
        $hashA = "\xF0\x9D\x92\xB3" . "\xF0\x9D\xA5\xB3" .
            "\xF0\x9D\x92\xB3" . "\xF0\x9D\xA5\xB3" .
            "\xF0\x9D\x92\xB3" . "\xF0\x9D\xA5\xB3" .
            "\xF0\x9D\x92\xB3" . "\xF0\x9D\xA5\xB3";
        $hashB = "\xF0\x9D\x92\xB3" . "\xF0\x9D\xA5\xB3" .
            "\xF0\xAD\x9F\xC0" . "\xF0\xAD\x9F\xC0" .
            "\xF0\xAD\x9F\xC0" . "\xF0\xAD\x9F\xC0" .
            "\xF0\xAD\x9F\xC0" . "\xF0\xAD\x9F\xC0";
        $hashC = "d9d38fdfd97aeffc71abd309b6548ca3d602b8e721c0ee14edd432038c41c292";
        $hashD = "d9d38fdfd97aeffc71abd309b6548ca3d602b8e721c0ee14edd432038c41c292";
        $this->assertTrue(!Utils::hashEquals($hashA, $hashB));
        $this->assertTrue(Utils::hashEquals($hashC, $hashD));
    }
    
    public function testHashAlgos()
    {
        $this->assertEquals((array) \hash_algos(), Utils::hashAlgos());
    }
    
    public function testHashHmacAlgos()
    {
        if (\version_compare(\PHP_VERSION, '7.2.0', '>='))
        {
            $this->assertTrue(\hash_hmac_algos() === Utils::hashHmacAlgos());
        } else
        {
            $this->assertTrue(\hash_algos() === Utils::hashHmacAlgos());
        }
    }
  
}

