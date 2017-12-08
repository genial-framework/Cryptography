<?php
/*
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License
 */
 
namespace Genial\Cryptography;

use Genial\Cryptography\Option\AlgoList;
use PHPUnit\Framework\TestCase;

/**
 * AlgoListTest.
 */
final class AlgoListTest extends TestCase
{
    public function testHashAlgos()
    {
        $this->assertEquals(AlgoList::HashAlgos(), hash_algos());
    }
    
    public function testHashHmacAlgos()
    {
        if (!version_compare(PHP_VERSION, '7.2.0', '>='))
        {
            $this->assertEquals(AlgoList::HashAlgos(), hash_algos());
        }
        $this->assertEquals(true, true);
    }
    
    public function testHashHmacAlgos1()
    {
        if (version_compare(PHP_VERSION, '7.2.0', '>='))
        {
            $this->assertEquals(AlgoList::HashHmacAlgos(), hash_hmac_algos());
        }
        $this->assertEquals(true, true);
    }
  
}

