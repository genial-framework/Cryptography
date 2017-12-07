<?php
/*
 * @link      <https://github.com/Genial-Framework/Cryptography> for the canonical source repository
 * @copyright Copyright (c) 2017-2017 Genial Framework. <https://github.com/Genial-Framework>
 * @license   <https://github.com/Genial-Framework/Cryptography/blob/master/LICENSE> New BSD License
 */

namespace Genial\Cryptography;

/**
 * Utils.
 */
class Utils
{
    public static function HashHmacAlgos()
    {
        if (function_exists('hash_hmac_algos'))
        {
            return hash_hmac_algos();
        }
        return hash_algos();
    }
    
}
