<?php
/*
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License
 */

namespace Genial\Cryptography;

use PHPUnit\Framework\TestCase;

/**
 * UtilsTest.
 */
class UtilsTest extends TestCase
{
    function testHashHmacAlgos()
    {
        if (!version_compare(PHP_VERSION, '7.2.0', '>='))
        {
            $this->assertEquals(Utils::HashHmacAlgos(), hash_algos());
        }
        $this->assertEquals(true, true);
    }
    
    function testHashHmacAlgos1()
    {
        if (version_compare(PHP_VERSION, '7.2.0', '>='))
        {
            $this->assertEquals(Utils::HashHmacAlgos(), hash_hmac_algos());
        }
        $this->assertEquals(true, true);
    }
  
}

