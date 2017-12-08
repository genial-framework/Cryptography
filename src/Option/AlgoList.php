<?php
/*
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License
 */
 
namespace Genial\Cryptography\Option;

/**
 * AlgoList.
 */
class AlgoList
{
    public static function HashAlgos()
    {
        return hash_algos();
    }
    
    public static function HashHmacAlgos()
    {
        return Utils::HashHmacAlgos();
    }
    
}
